import re
import sys
import json

class Articles:
    articles = []
    def append(self, article):
        self.articles.append(article)

    def json(self):
        articles = []
        for a in self.articles:
            article = a.get_article()
            articles.append(article)
        json_string = json.dumps(articles)
        return json_string
        