import re
import json
import codecs



def deleteEMOJI(textt) :
    emoji_pattern = re.compile("["
                               u"\U0001F600-\U0001F64F"  # emoticons
                               u"\U0001F300-\U0001F5FF"  # symbols & pictographs
                               u"\U0001F680-\U0001F6FF"  # transport & map symbols
                               u"\U0001F1E0-\U0001F1FF"  # flags (iOS)
                               "]+", flags=re.UNICODE)
    return emoji_pattern.sub(r'', text)

def delete(textt) :
  result_string=''
  print(type(textt))
  sen_result=[]
  for sentence in textt:
    for i in range(len(sentence)) :
      for c in sentence[i]: 
        if c==' ':
          result_string+=c
        if c.isalnum(): 
          result_string+=c

      sen_result.append(result_string)
      result_string=''

  return sen_result

d = json.load(codecs.open('C:/Users/wlgo6/Desktop/final_crawling/final_pizza.json', 'r', 'utf-8-sig'))

    # d=json.load(outfile)
arr=[]
sentences_tag=[]
rest_result=[]

for b in d['restList']:
  sentences_tag.append(b['review'])

arrr=delete(sentences_tag)
# print(arrr)
rest_dict={}
for i in range(len(arrr)) :
  rest_result.append(arrr[i])

rest_dict['review']=rest_result
dict1 = json.dumps(rest_dict, indent=2, ensure_ascii=False)

f = open("C:/Users/wlgo6/Desktop/final_clean/final_pizza_clcean.json", 'w', encoding='utf-8')
f.write(dict1)
