from django.shortcuts import render
from .models import Producto

lista_productos = [
        {"nombre": "Manzanas", "precio": 2.5, "oferta": True},
        {"nombre": "Plátanos", "precio": 1.8, "oferta": False},
        {"nombre": "Naranjas", "precio": 3.0, "oferta": True},
    ]   

# Create your views here.
def ejercicio1_view(request):
     
    return render(request, 'ejercicio1.html',{'productos': lista_productos})

def ejercicio2_view(request):
    return render(request, 'ejercicio2.html',{'productos': lista_productos})

def ejercicio3_view(request):
    lista_modelos = [Producto(nombre='Manzanas', precio=2.5, oferta=True),
                     Producto(nombre='Plátanos', precio=1.8, oferta=False),
                     Producto(nombre='Naranjas', precio=3.0, oferta=True)]
    return render(request, 'ejercicio3.html', {'productos': lista_modelos})
