from selenium import webdriver

driver = webdriver.Chrome("/usr/lib/chromium-browser/chromedriver")

driver.get("http://45.79.43.178/source_carts/wordpress/wp-login.php")

username = driver.find_element_by_name('log')
username.clear()
username.send_keys("admin")

password = driver.find_element_by_name('pwd')
password.clear()
password.send_keys("123456aA")

btn_submit = driver.find_element_by_name("wp-submit").click()

word = driver.find_element_by_class_name('display-name').text

print(word)
