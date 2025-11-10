from django.urls import path, include
from usuarios.views import usuario_view
import usuarios.urls

urlpatterns = [
    path('detalle', usuario_view, name='usuario'),
]