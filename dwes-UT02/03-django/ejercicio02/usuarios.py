"""
Ejercicio Python: Usuario y pagos mensuales en una asociación
- Se utilizan diccionarios para almacenar la información.
- Se trabaja con JSON para representar los datos.
- Se emplean bucles para recorrer y mostrar la información.
"""

import json

# Datos del usuario en formato JSON
usuario_json = """
{
    "nombre": "Laura",
    "apellidos": "Gómez Pérez",
    "dni": "12345678A",
    "email": "laura.gomez@example.com",
    "telefono": "654321987",
    "pagos": {
        "enero": 20,
        "febrero": 20,
        "marzo": 20,
        "abril": 0,
        "mayo": 20,
        "junio": 20,
        "julio": 20,
        "agosto": 0,
        "septiembre": 20,
        "octubre": 20,
        "noviembre": 20,
        "diciembre": 20
    }
}
"""

# Cargar JSON a un diccionario de Python
usuario = json.loads(usuario_json)

# Mostrar los datos personales
print("=== Datos del usuario ===")
print(f"Nombre: {usuario['nombre']}")
print(f"Apellidos: {usuario['apellidos']}")
print(f"DNI: {usuario['dni']}")
print(f"Email: {usuario['email']}")
print(f"Teléfono: {usuario['telefono']}\n")

# Mostrar pagos mes a mes
print("=== Pagos de la asociación ===")
total_pagado = 0
for mes, cantidad in usuario["pagos"].items():
    estado = "PAGADO" if cantidad > 0 else "PENDIENTE"
    print(f"{mes.capitalize():<10}: {cantidad} € -> {estado}")
    total_pagado += cantidad

print("\nTotal anual pagado:", total_pagado, "€")