from django.db import models

# Create your models here.
class Usuario(models.Model):
    nombre = models.CharField(max_length=100)
    apellidos = models.CharField(max_length=100)
    dni = models.CharField(max_length=9, unique=True)
    email = models.EmailField()
    telefono = models.IntegerField()    
    edad = models.IntegerField()
    def __str__(self):
        return f"{self.nombre} {self.apellidos} {self.dni} {self.email} {self.telefono} {self.edad}"
    
class Pago(models.Model):    
    mes = models.CharField(max_length=50)
    cantidad = models.DecimalField(max_digits=10, decimal_places=2)
    usuario = models.ForeignKey(Usuario, on_delete=models.CASCADE, related_name='pagos')

    def __str__(self):
        return f"Pago de {self.cantidad} en {self.mes} para {self.usuario}"