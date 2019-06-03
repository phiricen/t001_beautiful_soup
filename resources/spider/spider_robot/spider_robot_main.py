import requests
from bs4 import BeautifulSoup
import bs4
import sys
import re
import json
import numpy as np
import pymysql
import selenium

class SpiderRobot:
    url = {}

    def __init__(self):
        self.starter()
        self.init()

    def init(self):
        return

    def starter(self):    
        if len(sys.argv) == 1:
            exit
        elif len(sys.argv) == 2:
            function_name = sys.argv[1]
            func = getattr(self, function_name)
            func()
        elif len(sys.argv) == 3:
            function_name = sys.argv[1]
            arg_1 = sys.argv[2]
            func = getattr(self, function_name)
            func(arg_1)
        else:
            exit

    # 取得原始資料
    def send(self, url):
        resp = requests.get(url)

        #轉換編碼至UTF-8
        resp.encoding = 'utf-8'

        soup = BeautifulSoup(resp.text, 'html.parser')
        return soup

    # 取得文章一覽
    def get_article_list(self):
        return

    # 取得文章內容
    def get_article_detail(self, article_id):
        return

    # 取得文章詳細
    def get_text(self, element, path):
        text = element.select(path)[0].text.strip()
        return text