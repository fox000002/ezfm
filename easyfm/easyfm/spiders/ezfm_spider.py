from scrapy.spider import BaseSpider
from scrapy.selector import HtmlXPathSelector

from easyfm.items import EasyfmItem

class EzfmSpider(BaseSpider):
    name = "ezfm"
    allowed_domains = ["cri.cn"]
    start_urls = [
        "http://english.cri.cn/easyfm/easymorning.html",
    ]

    def parse(self, response):
        #filename = response.url.split("/")[-2]
        #open(filename, 'wb').write(response.body)
        base_url = response.url
        hxs = HtmlXPathSelector(response)
        pages = hxs.select('//div[@class="interviewlist"]//a[not(@target)]')
        items = []
        for page in pages:
            item = EasyfmItem()
            item['title'] = page.select('text()').extract()
            item['url'] = page.select('@href').extract()
            items.append(item)
        return items

