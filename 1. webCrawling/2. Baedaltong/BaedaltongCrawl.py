import re
from datetime import date, timedelta
import datetime
from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import os
import time
import json
from collections import OrderedDict

r =[]
def baedaltong():


	#드라이버 접속 
	driver=webdriver.Chrome('C:/chromedriver')
	driver.get('http://www.bdtong.co.kr/')
	driver.implicitly_wait(10)


	#공릉동으로 접속 
	elem=driver.find_element_by_name('posCurrent')
	elem.send_keys('서울특별시 관악구 성현동')
	elem.send_keys(Keys.ENTER)


	# elem.send_keys(Keys.ENTER)
	time.sleep(0.3)

	loc=driver.find_element_by_xpath('//*[@id="addr_list"]/li[1]')
	driver.execute_script("arguments[0].click();", loc)
	driver.implicitly_wait(5)


	#태그 별로 접속 
	html = driver.page_source
	soup=BeautifulSoup(html, 'html.parser')
	tg=[]

	for link in soup.find("ul", {"class": "gnb"}).find_all('a') :
		tg.append(link)
        
	for t in range(len(link)) : 
		t=t+1
		#tags=tg[t].get('href')
		#print(tags)
		#tags = "index.php?c_category=C01" #중식
		tags = "index.php?c_category=C04"  # 족발
		#tags = "index.php?c_category=C08"  # 한식
		#tags = "index.php?c_category=C06"  # 일식
		driver.get('http://www.bdtong.co.kr/'+tags)
		driver.implicitly_wait(5)
        
		html = driver.page_source
		soup=BeautifulSoup(html, 'html.parser')
        
		res_num=soup.find("p", {"class":"noticeText"}).find("strong", {"class":"num"})
		res_num_text=res_num.get_text()

		d={}
		L=[]

		for res in range(1,int(res_num_text)+1):
			body=driver.find_element_by_tag_name("body")
			num_of_pagedowns=400
			print(res)

			if (res>14) : 
				while (num_of_pagedowns >0) : 
					body.send_keys(Keys.PAGE_DOWN)
					time.sleep(0.2)
					num_of_pagedowns-=2
				print("scroll end")
				# driver.implicitly_wait(10)
				time.sleep(10)
				driver.find_element_by_xpath('//*[@id="store_list"]/li['+str(res)+']/a/div').click()

			else : 
				driver.find_element_by_xpath('//*[@id="store_list"]/li['+str(res)+']/a/div').click()
				
			#식당 클릭 
			# driver.implicitly_wait(3)
            
			#리뷰 탭 클릭 
			driver.find_element_by_xpath('//*[@id="subContents"]/div/div[1]/div[3]/div[1]/div[1]/ul/li[2]/a').click()
			driver.implicitly_wait(3)
            
			html_text = driver.page_source
			soup = BeautifulSoup(html_text, 'html.parser')
            
			restaurant=soup.find("div", {"class":"detlow dlow1"}).find("strong", {"class":"name"})
			review_num=soup.find("a", {"class":"rtab on"}).find("span", {"class":"org"})

            #레스토랑 이름 ,리뷰 개수 찾기	
			restaurant_text=restaurant.get_text()
			review_num_text=review_num.get_text()
			print("review "+review_num_text)
			body=driver.find_element_by_tag_name("body")
			review_num_text=review_num_text.replace(',','')
			rm2=int(review_num_text)


			while (rm2>0) :
				body.send_keys(Keys.PAGE_DOWN)
				time.sleep(0.2)
				rm2-=2

			r.append(rm2)
			print("reviews end")
			driver.implicitly_wait(10)


			html_text = driver.page_source
			soup = BeautifulSoup(html_text, 'html.parser')
            #리뷰 저장
			review=[]
			i = 1
			first_crawl = soup.find("ul", {"class": "talklist"}).findAll("p", {"class": "text"})
			for a in first_crawl:
				review.append(a.get_text())
				i += 1
            #stars list에 별개수 저장            
			count=0
            
			list2=[]
			stars=[]
			star=soup.find("ul", {"class":"talklist"}).findAll("img")
			for a in star :
				b=a.get("src")

				if(b[:4]=='http') :
					c=b.split('/')
					if(c[-1]=='gibstar_full.png') :
						count+=1
						list2.append(count)

					else :
						None
				else : 
					count=0
					list2.append(count)
                    
			for j in range(0, len(list2)) :
				if(list2[j-1]==list2[j]-1 and list2[j+1] == 0) :
					stars.append(list2[j])
                    
            #list11에 날짜 저장하기 
			list11=[]
			second_crwal = soup.find("ul", {"class":"talklist"}).findAll("p", {"class":"date"})
			i=0
			for b in second_crwal:
				list11.append(b.get_text())		
				i+=1

			d = {}
			L = []
    # d[resName].append(data)
			d_content = {}
			d_content.update([("res_name", restaurant_text),("review_num", review_num_text), ("address", "서울시 관악구 성현동"), ("review", review), ("date", list11), ("stars", stars)])
			# L.append(d_content)
    #d[resName] = {}
   #  d["restList"] = L

			with open("D:/Third_Grade/second_Se/SAD/Team/Crawl/족발.json", 'a', encoding='utf-8') as outfile:
				dict1 = json.dumps(d_content, indent=2, ensure_ascii=False)
				outfile.write(dict1+',')

			r.append(review_num)

			print("success")
			res+=1
			driver.get('http://www.bdtong.co.kr/'+tags)
			driver.implicitly_wait(5)
		

		t+=1





	driver.close()


def main():
		baedaltong()
		print(print(sum(r)))

if __name__ == '__main__':
	main()








