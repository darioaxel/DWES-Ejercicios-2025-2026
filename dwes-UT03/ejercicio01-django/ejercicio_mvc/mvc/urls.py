from django.urls import  path
from .views import ejercicio1_view, ejercicio2_view, ejercicio3_view

urlpatterns = [
    path('ejercicio1/', ejercicio1_view, name='ejercicio1'),
    path('ejercicio2/', ejercicio2_view, name='ejercicio2'),
    path('ejercicio3/', ejercicio3_view, name='ejercicio3'),
]