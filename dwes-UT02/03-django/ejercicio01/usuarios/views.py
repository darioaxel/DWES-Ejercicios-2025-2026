from django.shortcuts import render

# Create your views here.
from django.http import HttpResponse

def usuario_view(request):
    datos = {
        "nombre": "Ana",
        "apellidos": "Martínez Pérez",
        "edad": 30,
        "email": "ana@example.com",
    }
    html = f"""
    <html>
        <head><title>Datos de un Usuario</title></head>
        <body>
            <h1>Información personal</h1>
            <p><strong>Nombre:</strong> {datos['nombre']}</p>
            <p><strong>Apellidos:</strong> {datos['apellidos']}</p>
            <p><strong>Edad:</strong> {datos['edad']}</p>
            <p><strong>Email:</strong> {datos['email']}</p>
        </body>
    </html>
    """
    return HttpResponse(html)
