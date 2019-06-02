import requests
from bs4 import BeautifulSoup
import bs4
import numpy as np
import pymysql
import selenium

class SpiderRobot:
    url = {}
    def __init__(self):
        self.url = {}

    def send(self, url):
        r = requests.get(url)
        soup = BeautifulSoup(r.text, 'html.parser')
        return soup
    
    def run(self):
        print('run')
        
    def get_text(self, element, path):
        text = element.select(path)[0].string.strip()
        return text