import requests
from bs4 import BeautifulSoup
from fpdf import FPDF

# Crear una clase PDF personalizada para agregar encabezado y pie de página
class PDF(FPDF):
    def header(self):
        # Seleccionar fuente y tamaño
        self.set_font("Arial", "B", 12)
        # Agregar título en el encabezado
        self.cell(0, 10, "Encabezado del Documento", 0, 1, "C")

    def footer(self):
        # Posicionar a 1.5 cm del fondo
        self.set_y(-15)
        # Seleccionar fuente y tamaño para el pie de página
        self.set_font("Arial", "I", 8)
        # Agregar texto al pie de página con número de página
        self.cell(0, 10, f"Página {self.page_no()}", 0, 0, "C")

# URL de la página a scrapear
url = 'https://grafana.marandu.com.ar/d/CTGUbUIVk/grupo-electrogeno?orgId=1'

# Realizar la solicitud HTTP
response = requests.get(url)

# Crear una instancia del objeto PDF
pdf = PDF()
pdf.add_page()
pdf.set_font("Arial", size=12)

if response.status_code == 200:
    soup = BeautifulSoup(response.content, 'lxml')
    titles = soup.find_all('h1')

    # Agregar los datos al PDF
    for title in titles:
        pdf.set_font("Arial", size=14, style='B')  # Fuente en negrita para los títulos
        pdf.cell(0, 10, txt=title.get_text(), ln=True, align='L')
        pdf.ln(5)  # Añadir un pequeño espacio entre títulos
else:
    pdf.set_font("Arial", size=12)
    pdf.cell(0, 10, txt='Error al acceder a la página', ln=True, align='C')

# Guardar el PDF en un archivo
pdf.output("resultado.pdf")
