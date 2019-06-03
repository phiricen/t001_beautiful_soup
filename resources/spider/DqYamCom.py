import re
import sys
import requests
from bs4 import BeautifulSoup
from spider_robot.spider_robot_main import SpiderRobot
from util.articles import Articles
from util.article import Article

class DqYamCom(SpiderRobot):
    url = {
        'list'    : 'https://dq.yam.com/list.php',
        'article' : 'https://dq.yam.com/post.php?id=%s'
    }

    def get_article_detail(self, article_id):
        url = self.url['article']%(article_id)
        soup = self.send(url)

        # 初始化參數
        article = {}

        # 文章標題
        article['title']  = soup.find('header').h1.get_text().strip()

        # 作者部分
        if (soup.select('.repost')):
            article['author'] = soup.select('.repost .box')[0].get_text()
        else:
            article['author'] = soup.select('.headerBar')[0].span.get_text()
        article['author'] = article['author'].strip().replace('by：', '')

        # 文章內容
        content = ''
        content+= soup.select('.description')[0].p.get_text().strip()
        for el in soup.select('.imgBox > *'):
            content+= el.get_text().strip()
        article['content'] = content

        # 輸出 JSON
        article_json = article.json()
        print(article_json)

    def get_article_list(self):
        url = self.url['list']
        soup = self.send(url)

        raw_articles = soup.select('div.imgWrap')

        # 初始化參數
        articles = Articles()

        for ra in raw_articles:
            article = Article()

            # 取得文章編號
            _id = re.match('^/post.php\\?id=(\\d*)', ra.a['href'])
            if _id == None:
                continue

            article.article_id = _id[1]

            # 取得文章縮圖
            article.thumbnail  = ra.a.figure.img['src']

            article.dt_create  = self.get_text(ra, 'a > figure > figcaption > time')
            article.dt_modify  = self.get_text(ra, 'a > figure > figcaption > time')
            article.title      = self.get_text(ra, 'a > figure > figcaption > h3')
            article.summary    = self.get_text(ra, 'a > figure > figcaption > p')
            article.view_times = self.get_text(ra, 'ul.listFunc.tips > li.viwer > span')
            articles.append(article)

        # 輸出 JSON
        articles_json = articles.json()
        # print(articles)
        print(articles_json)

DqYamCom()