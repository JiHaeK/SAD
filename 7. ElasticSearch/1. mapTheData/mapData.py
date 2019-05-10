import json
import codecs
import numpy


crawl=json.load(codecs.open(r"C:/Users/wlgo6/Desktop/SAD_team2_source_file/1. webCrawling/3. Final_crawling_result_files/final_korea.json",'r','utf-8-sig')) # 크롤링 된 데이터
parsing=json.load(codecs.open(r"C:/Users/wlgo6/Desktop/SAD_team2_source_file/3. Morphological Analysis/2. Output/final_korea_ht.json",'r','UTF-8-sig')) #형태소 분석 된 데이터

restList=crawl["restList"] # 식당 리스트
#point=pos["result"] # 업체지수 포인트
parsing=parsing["final_result"] # 형태소 분석 어레이

d=0 # ide
c=0

for i in range(len(restList)):
    #식당별로 접속

    name = restList[i]["res_name"] # 식당 이름
    num = restList[i]["review_num"] # 리뷰 개수
    add = restList[i]["address"] # 리뷰 주소
    #pt = point[i]["our_point"] # 업체지수

    star_list=restList[i]["stars"] # 별점 리스트
    date_list=restList[i]["date"] #날짜 리스트

    for j in range(len(star_list)): #리뷰별로

        star=star_list[j] #리뷰 하나의 별점
        date=date_list[j] #리뷰 하나의 날짜
        word = parsing[c][str(c)] #리뷰 하나의 형태소 분석

        #############요기요 날짜 바꾸기 ###################
        if("작성" in date):
            date = date[0] + date[1] + date[2] + date[3] + "-" + date[6] + date[7] + "-" + date[10] + date[11]
        if(len(date)==13):
            date = date[0] + date[1] + date[2] + date[3] + "-" + date[6] + date[7] + "-" + date[10] + date[11]
        if(len(date)==12):
            if(date[7]=="월"):
                date=date[0] + date[1] + date[2] + date[3] + "-" + date[6] + "-" + date[9] + date[10]
            else:
                date = date[0] + date[1] + date[2] + date[3] + "-" + date[6] +date[7]+ "-" + date[10]
        if("어제" in date):
            date = "2018-12-16"
        if("일주일" in date):
            date="2018-12-09"
        if("시간" in date):
            date = "2018-12-17"
        if("일" in date):
            day=17-int(date[0])
            date="2018-12-"+str(day)
        if("분" in date):
            date="2018-12-18"
        #################################################

        for w in word:

            dict0={"index":{"_index":"res_analysis","_type":"record","_id":d}}
            dict1={"category":"일식","res_name":name,"review_num":num,"address":add,"star_point":star,"date":date,"word":w}

            with open("D:/Third_Grade/second_Se/SAD/Team/FinalSourceCode/Software Analysis and Design Team2/7. ElasticSearch/OutPutData/Mpizza.json", 'a', encoding='utf-8') as outfile:

                dic0 = json.dumps(dict0, ensure_ascii=False)
                dic1 = json.dumps(dict1, ensure_ascii=False)

                outfile.write(dic0 + "\n")
                outfile.write(dic1 + "\n")

                d=d+1

        c=c+1

    #식당별 별점, 날짜, 형태소 가져오기
    #{"index":{"_index":"classes","_type":"record","_id":"1"}}
    #{"res_name":"야미가 마포본점","address":"서울시 강남구 청담동", "review":"맛있어요","date":"2018-11-25","stars":"5"}
