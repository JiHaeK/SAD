import json
import codecs
import os
import glob


d = json.load(codecs.open('C:/Users/wlgo6/Desktop/final_crawling/final_china.json', 'r', 'utf-8-sig'))

dicc = {
    'id': '',
    'permalink':'',
    'username':'asdfg',
    'text': '',
    'date':'Mon Dec 10 23:59:44 +0000 2018',
    'retweets':'30',
    'favorites':'20',
    'mentions':[],
    'hashtags':[],
    'geo': ''
}
#178
    print(j)
    print("==========")
    # if (len(d["restList"][j]["review"]) > ) : 
for j in range(len(d['restList'])) :
  with open("C:/Users/wlgo6/Desktop/pre_sent/china/final_china_rest"+str(j)+".json", 'w', encoding='utf-8') as outfile:


    for i in range(0, len(d["restList"][j]["review"])) :
      a = d["restList"][j]["review"][i]
      dicc['id']=d["restList"][j]["res_name"]
      dicc['text']=a
      dict1 = json.dumps(dicc, indent=2, ensure_ascii=False)
      outfile.write(dict1+',')

for jj in range(len(d['restList'])) :
  openfile = open('C:/Users/wlgo6/Desktop/pre_sent/china/final_china_rest'+str(jj)+".json",'r',encoding='utf-8' )
  read_file = openfile.read()
  new_content = "[" + read_file + "]"
  new_content2 = new_content.replace(",]","]")
  new_content3 = new_content2.replace("[{","[{")

  if(jj>=0 and jj<=9) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-01-0'+str(jj)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()
  if(jj>=10 and jj<=30) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-01-'+str(jj)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()    
  if(jj>30 and jj<=60) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-02-'+str(jj%30)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()
  if(jj>60 and jj <= 90) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-03-'+str(jj%60)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()    
  if(jj>90 and jj <= 120) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-04-'+str(jj%90)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()
  if(jj>120 and jj <= 150) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-05-'+str(jj%120)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()         
  if(jj>150 and jj <= 180) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-06-'+str(jj%150)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()    
  if(jj>180 and jj <= 210) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-07-'+str(jj%180)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()    
  if(jj>210 and jj <= 240) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-08-'+str(jj%210)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()    
  if(jj>240 and jj <= 250) :
    write_file = open('C:/Users/wlgo6/Desktop/pre_sent_result/china/2016-09-'+str(jj%240)+".json",'w',encoding='utf-8' )
    write_file.write(new_content3)
    write_file.close()    