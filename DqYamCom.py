import requests
from bs4 import BeautifulSoup
from tool.spider_robot import SpiderRobot

class DqYamCom(SpiderRobot):
    def __init__(self):
        super(DqYamCom, self).__init__()

    def get_article_list(self):
        self.url = {
            'list' : 'https://dq.yam.com/list.php'
        }
        soup = self.send(self.url['list'])

        raw_articles = soup.select('div.imgWrap')

        for ra in raw_articles:
            article = { 'title' : '','short' : '' }
            article['title']   = self.get_text(ra, 'a > figure > figcaption > h3')
            article['summary'] = self.get_text(ra, 'a > figure > figcaption > p')
            print(article)


app = DqYamCom()
app.get_article_list()