import collections
import collections
import datetime
import json
import collections
import collections
import datetime
import json
import math
import os
import re
import time
from datetime import date, timedelta
from lib2to3.pgen2 import driver

from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.wait import WebDriverWait

totalcount = [4779]


for i in range(1,68):
    # 카테고리에서 검색되는 음식점 수를 range로 잡기
    # i=1로 시작할 것
    print("count", i)

    driver = webdriver.Chrome('/Users/Administrator/Downloads/chromedriver_win32/chromedriver')
    driver.get('https://www.yogiyo.co.kr/mobile/#/')
    driver.implicitly_wait(4)
    elem = driver.find_element_by_name('address_input')
    elem.clear()
    driver.implicitly_wait(4)
    elem.send_keys('서울 송파구 방이동')
    elem.send_keys(Keys.ENTER)
    time.sleep(0.3)
    driver.implicitly_wait(4)
    category = driver.find_element_by_xpath('//*[@id="category"]/ul/li[10]')
    # li[5]부터가 우리가 취급하는 첫 카테고리(치킨)
    driver.execute_script("arguments[0].click();", category)
    # 카테고리 클릭하는 코드.

    driver.implicitly_wait(4)
    body = driver.find_element_by_tag_name("body")
    down_n = 10
    # 시간 낭비 줄기이 위해 i range 크기에 따라서 숫자 조절

    while down_n:
        body.send_keys(Keys.PAGE_DOWN)
        time.sleep(0.3)
        down_n -= 1
    element = driver.find_element_by_xpath('//*[@id="content"]/div/div[4]/div[' + str(i + 1) + ']/div')
    driver.execute_script("arguments[0].click();", element)
    driver.implicitly_wait(10)

    clickR = driver.find_element_by_css_selector(
        '#content > div.restaurant-detail.row.ng-scope > div.col-sm-8 > ul > li:nth-child(2) > a')
    driver.execute_script("arguments[0].click();", clickR)

    count = driver.find_element_by_css_selector(
        '#content > div.restaurant-detail.row.ng-scope > div.col-sm-8 > ul > li.active > a > span').text
    countTO = count.strip()
    countT = float(countTO) #int였음
    if countT != 0:
        countR = driver.find_element_by_css_selector(
            '#content > div.restaurant-detail.row.ng-scope > div.col-sm-8 > ul > li:nth-child(2) > a >span').text
        resName = driver.find_element_by_css_selector(
            '#content > div.restaurant-detail.row.ng-scope > div.col-sm-8 > div.restaurant-info > div.restaurant-title >span').text
        more = int(countR) // 10
        if countT > 10:
            seemore = driver.find_element_by_css_selector(
                '#content > div.restaurant-detail.row.ng-scope > div.col-sm-8 > div > ul#review> li:nth-child(12) > a')
            if countT % 10 != 0:
                for i in range(0, more):
                    driver.execute_script("arguments[0].click();", seemore)
            else:
                for i in range(0, more - 1):
                    driver.execute_script("arguments[0].click();", seemore)
        result = driver.page_source
        soup = BeautifulSoup(result, 'html.parser')
        first_crawl = soup.find("ul", {"id": "review"}).find_all("span", {"ng-bind": "review.time|since"})
        star_crawl = soup.find("ul", {"id": "review"}).find_all("span", {"class":"total"})

        # review > li:nth-child(2) > div:nth-child(2) > div > span.total > span.full.ng-scope

        # crawl1 = soup.find("ul", {"id": "review"}).find_all("span", {"class": "points ng-binding",
        #                                                              "ng-show": "review.rating_taste > 0"})
        # crawl2 = soup.find("ul", {"id": "review"}).find_all("span", {"class": "points ng-binding",
        #                                                              "ng-show": "review.rating_quantity > 0"})
        # crawl3 = soup.find("ul", {"id": "review"}).find_all("span", {"class": "points ng-binding",
        #                                                              "ng-show": "review.rating_delivery > 0"})

        second_crawl = soup.find("ul", {"id": "review"}).find_all("p", {"ng-bind-html": "review.comment|strip_html"})

        review = []

        for a in second_crawl:
            review.append(a.get_text())

        # starT = []
        # starQ = []
        # starD = []


        date = []
        for f in first_crawl:
            date.append(f.get_text())

        starFinal = []

        crawl = soup.find("ul", {"id": "review"}).find_all("span", {"class" : "total"})
        # while(len(crawl) != countT):
        time.sleep(2)

        if(countT!=0):
            for t in range(0, int(countT)):
                print(len(crawl))
                print(t)
                count_crawl = crawl[t].find_all("span", {"class": "full ng-scope"})
                # count_crawl = driver.find_elements_by_css_selector('review > li:nth-child(' + str(s) + ') > div:nth-child(2) > div > span.total > span.full.ng-scope')
                starT = []
                for c in count_crawl:
                    starT.append("1")
                point = len(starT)
                starFinal.append(point)
                print(starFinal)

        d = {}
        L = []
        # d[resName].append(data)
        d_content = {}
        d_content.update(
            [("res_name", resName),("address" , '서울 송파구 방이동'), ("review_num", countR), ("review", review), ("date", date), ("stars", starFinal)])
        L.append(d_content)
        #d[resName] = {}
       #  d["restList"] = L
        with open("C:/Users/Administrator/Desktop/crawling/pigfoot.json", 'a+', encoding='utf-8') as outfile:
            dict1 = json.dumps(d_content, indent=2, ensure_ascii=False)
            outfile.write(dict1+',')
    print(countT)

    totalcount.append(countT)
    print("total" , sum(totalcount))
    #리뷰 수 총합 프린트
    driver.close()







