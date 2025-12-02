from django.urls import path, include
from usuarios.views import usuario_view
import usuarios.urls

urlpatterns = [
    path('', usuario_view, name='usuario'),
]