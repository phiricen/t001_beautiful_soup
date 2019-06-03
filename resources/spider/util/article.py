import re
import sys
import json

class Article:
    article_id  = ''
    category    = ''
    author      = ''
    title       = ''
    thumbnail   = ''
    dt_create   = ''
    dt_modify   = ''
    title       = ''
    summary     = ''
    view_times  = ''

    def get_article(self):
        article = {
            'article_id'  : self.article_id,
            'category'    : self.category,
            'title'       : self.title,
            'author'      : self.author,
            'thumbnail'   : self.thumbnail,
            'view_times'  : self.view_times,
            'dt_create'   : self.dt_create,
            'dt_modify'   : self.dt_modify,
            'title'       : self.title,
            'summary'     : self.summary,
        }
        return article
    def json(self):
        article = self.get_article()
        json_string = json.dumps(article)
        return json_string