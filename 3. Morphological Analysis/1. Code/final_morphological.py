import json
from konlpy.tag import Okt
from konlpy.tag import Kkma
from collections import Counter
import time
from time import strftime

twitter = Okt()

with open('C:/Users/Hanbi/Desktop/kimjihae/final_clean/final_pizza_clcean.json', 'r', encoding='utf-8') as outfile:
    d = json.load(outfile)
    print(type(d))
    sentences_tag = []
    sen_result = []

    start_time = time.time()

    senetestss = d['review']
    result_string = ''
    for i in range(len(senetestss)):
        strr = senetestss[i]
        morph = twitter.pos(strr)
        sen_result.append(morph)
        morph = ''

    print("success")

    noun_adj_list = []
    noun_result = {}
    to_list=[]
    for s in range(len(sen_result)):
        for word, tag in sen_result[s]:
            indexing = 0;
            if tag in ['Noun', 'Adjective']:
                indexing += 1
                noun_adj_list.append(word)
        # noun_result[str(s)] = noun_adj_list
        dict22 = {"%s" % s: noun_adj_list}
        to_list.append(dict22)

        noun_adj_list = []
        dict22={}

    print("noun_adj_list good")

    d = {}
    real=[]
    d['final_result'] = to_list

    print("training Runtime: %0.02f Minutes" % ((time.time() - start_time) / 60))

    finall = json.dumps(d, indent=4, ensure_ascii=False)

    out_ret = open('C:/Users/Hanbi/Desktop/kimjihae/ht_final/final_pizza_ht.json', 'w')
    out_ret.write(finall)