from playwright.sync_api import sync_playwright

# URL de la página de inicio de sesión y la página protegida para el primer script
login_url = 'http://10.3.150.11/index.html'
secure_url = 'http://10.3.150.11/secure/index.html'

# URL de inicio de sesión y páginas de Grafana para el segundo script
grafana_login_url = 'https://grafana.marandu.com.ar/login'
grafana_target_urls = [
    'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1&viewPanel=83',
    'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1&viewPanel=130',
    'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1&viewPanel=133',
    'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1&viewPanel=128',
    'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1&viewPanel=134',
    'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1&viewPanel=132',
    'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1&viewPanel=135'
]

def main():
    with sync_playwright() as p:
        # Lanza el navegador Chromium
        browser = p.chromium.launch(headless=True)

        # Crea una nueva página en el navegador
        page = browser.new_page()

        # Inicia sesión en la página protegida del primer script
        page.goto(login_url)
        page.fill('input[name="username"]', 'NOC')
        page.fill('input[name="password"]', 'noc1435')
        page.click('input[type="button"]')  # Cambia el selector si el botón de envío tiene un id o clase específica
        page.wait_for_url(secure_url, timeout=5000)
        page.goto(secure_url)
        page.wait_for_timeout(2000)  # Reduce el tiempo de espera

        # Extrae los valores del primer script
        fuel_level_div = page.query_selector('div.cellValue[id="3"]')
        if fuel_level_div:
            fuel_level = fuel_level_div.inner_text()
            unit_div = page.query_selector('div.cellUnitValue[id="3_UNIT"]')
            unit = unit_div.inner_text() if unit_div else ''
            print(f"Nivel de combustible en Apostoles: {fuel_level} {unit}")
        else:
            print("No se encontró el div con id '3'.")

        # Inicia sesión en Grafana
        page.goto(grafana_login_url)
        page.fill('input[name="user"]', 'noc')
        page.fill('input[name="password"]', 'm4r4ndu#c0m')
        page.click('button.css-8csoim-button')
        page.wait_for_load_state('networkidle', timeout=5000)

        # Extrae valores de Grafana en paralelo
        def extract_fuel_level(url, idx):
            page.goto(url)
            page.wait_for_load_state('networkidle', timeout=5000)
            span_values = page.query_selector_all('span')

            if idx == 0:
                span_value = span_values[22].text_content().strip()
                span_percentage = span_values[23].text_content().strip()
                fuel_level = f"{span_value}{span_percentage}"
                print(f"Nivel de combustible en ADO: {fuel_level}")

            elif idx == 1:
                span_value = span_values[25].text_content().strip()
                span_percentage = span_values[26].text_content().strip()
                fuel_level = f"{span_value}{span_percentage}"
                print(f"Nivel de combustible en JAM: {fuel_level}")

            elif idx == 2:
                span_value = span_values[28].text_content().strip()
                span_percentage = span_values[29].text_content().strip()
                fuel_level = f"{span_value}{span_percentage}"
                print(f"Nivel de combustible en SAN JOSE: {fuel_level}")

            elif idx == 3:
                span_value = span_values[23].text_content().strip()
                span_percentage = span_values[24].text_content().strip()
                fuel_level = f"{span_value}{span_percentage}"
                print(f"Nivel de combustible en Aristobulo del valle: {fuel_level}")

            elif idx == 4:
                span_value = span_values[29].text_content().strip()
                span_percentage = span_values[30].text_content().strip()
                fuel_level = f"{span_value}{span_percentage}"
                print(f"Nivel de combustible en San pedro: {fuel_level}")

            elif idx == 5:
                span_value = span_values[27].text_content().strip()
                span_percentage = span_values[28].text_content().strip()
                fuel_level = f"{span_value}{span_percentage}"
                print(f"Nivel de combustible en parque tecnologico: {fuel_level}")

            elif idx == 6:
                span_value = span_values[30].text_content().strip()
                span_percentage = span_values[31].text_content().strip()
                fuel_level = f"{span_value}{span_percentage}"
                print(f"Nivel de combustible en San vicente: {fuel_level}")

        for idx, url in enumerate(grafana_target_urls):
            extract_fuel_level(url, idx)

        # Cierra el navegador
        browser.close()

if __name__ == "__main__":
    main()
