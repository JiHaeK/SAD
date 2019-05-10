import json
import codecs
from collections import OrderedDict


dd = json.load(codecs.open('C:/Users/Hanbi/Desktop/final_chicken.json', 'r', 'utf-8-sig'))
d = json.load(codecs.open('C:/Users/Hanbi/Desktop/1218/result/2016-12-04.json', 'r', 'utf-8-sig')) #식당마다 json파일 바뀜

b=[]
index=[]

for i in range(len(d)):

    a = d[i]["polarity"]["pos"]
    aa = float(a or 0)

    if aa >= 0.2:
        index.append(i)

review=[]
for i in range(0, len(index)):
    r = d[i]["text"]
    review.append(r)

d2=[]

for j in range(len(dd["restList"])):
    ddd=dd["restList"][j]["res_name"]
    d2.append(ddd)


i=d2.index(str(d[0]["id"]))
num=0
num=len(dd["restList"][i]["review"])

w=str(review)
correlation = []
keyword=['기름','바삭','퍽퍽','살'] #카테고리마다 키워드 달라짐
for i in range(0,4):
    k=keyword[i]
    str(k)
    m=w.count(k)
    cor=m/num


    correlation.append(cor)
    print(correlation)

file_data = OrderedDict()
file_data["res_name"] = d[0]["id"]
file_data["k1"] = correlation[0]
file_data["k2"] = correlation[1]
file_data["k3"] = correlation[2]
file_data["k4"] = correlation[3]

with open("C:/Users/Hanbi/Desktop/1218/correlation/correlation_chicken.json", 'a',
          encoding='utf-8') as outfile:
    dict1 = json.dumps(file_data, indent=2, ensure_ascii=False)
    outfile.write(dict1 + ',')







