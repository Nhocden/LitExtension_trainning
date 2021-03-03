import requests
import json
import csv

username = '8dab034c6d00635cae00ea346270f789'
password = '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'
shopname = 'so-long-road'

url = 'https://'+username+':'+password+'@'+shopname+'.myshopify.com/admin/api/2021-01/customers.json'


def save_csv_by_api():
    
    resp = requests.Session().get(url)
    
    dict_content = json.loads(resp.text)['customers']

    cols = dict_content[0].keys()
    rows = []
    for c in dict_content:
        c.pop('addresses')
        rows.append(c.values())

    with open('customer.csv', 'w') as f:      
    # using csv.writer method from CSV package 
        write = csv.writer(f) 
          
        write.writerow(cols) 
        write.writerows(rows) 
    
save_csv_by_api()