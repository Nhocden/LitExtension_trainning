import requests
from bs4 import BeautifulSoup

def login_by_request():

    datas = {
        'log': 'admin',
        'pwd': '123456aA',
        'wp-submit': 'Log In',
        'testcookie': '1'
    }
    resp = requests.Session().post('http://45.79.43.178/source_carts/wordpress/wp-login.php', datas)
    
    new_headers = "Cookie: "
    for c in resp.cookies:
        new_headers += c.name + '=' + c.value + ';'

    new_headers = new_headers[:-1]

    headers = {
        'Cookie': new_headers
    }

    resp2 = requests.Session().get('http://45.79.43.178/source_carts/wordpress/wp-admin/', headers=headers)

    soup = BeautifulSoup(resp2.content, 'html.parser')

    soup.prettify()

    word = soup.find_all('span', class_='display-name')[0].get_text()
    print(word)

login_by_request()
