import pytest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

@pytest.fixture(scope="module")
def driver():
    driver = webdriver.Chrome()
    yield driver
    driver.quit()

def test_login(driver):
    # Open Laravel login page
    driver.get("http://localhost:8000/login")

    # Fill in login form
    driver.find_element(By.NAME, "email").send_keys("hasanchamara1234@gmail.com")
    driver.find_element(By.NAME, "password").send_keys("chamara")

    # Wait for the Log In button to be clickable
    wait = WebDriverWait(driver, 10)
    login_button = wait.until(EC.element_to_be_clickable((By.XPATH, "/html/body/div/form/button")))

    # Click the button
    login_button.click()

    # Wait and validate login (check for a specific element only visible on the Dashboard)
    wait.until(EC.presence_of_element_located((By.XPATH, "/html/body/div/aside/ul/li[1]/a")))

    assert "Dashboard" in driver.page_source
