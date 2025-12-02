package es.dwes.UT01;

import java.io.Serializable;
import java.util.List;
import java.util.Map;

import jakarta.enterprise.context.RequestScoped;
import jakarta.inject.Named;

@Named("helloBean")
@RequestScoped
public class HelloBean implements Serializable {

    // Práctica 2: Genera en este bean el listado de usuarios que 
    // se mostrará en la página.xhtml
    
    //Como en el enunciado no se especifica el número de usuarios a crear, he creado una lista de 5 usuarios
    //Creo los usuarios
    public List<Usuario> getUsuarios() {
        Usuario usuario1 = new Usuario("Juan", "García", "12345678A", "juan.gar@gmail.com", 30, Map.of("Enero", 50.0, "Febrero", 75.0, "Marzo", 60.0, "Abril", 80.0, "Mayo", 90.0, "Junio", 0.0));
        Usuario usuario2 = new Usuario("María", "López", "87654321B", "marilo21@gmail.com", 25, Map.of("Enero", 40.0, "Febrero", 65.0, "Marzo", 0.0, "Abril", 85.0, "Mayo", 95.0, "Junio", 60.0));
        Usuario usuario3 = new Usuario("Carlos", "Martínez", "11223334C", "martincarlos_123@gmail.es", 28, Map.of("Enero", 0.0, "Febrero", 70.0, "Marzo", 75.0, "Abril", 90.0, "Mayo", 100.0, "Junio", 65.0));
        Usuario usuario4 = new Usuario("Ana", "Sánchez", "44332211D", "sanchez_ana@gmail.es", 32, Map.of("Enero", 60.0, "Febrero", 80.0, "Marzo", 85.0, "Abril", 95.0, "Mayo", 110.0, "Junio", 70.0));
        Usuario usuario5 = new Usuario("Luis", "Rodríguez", "55667788E", "rodri_luis@gmail.com", 27, Map.of("Enero", 45.0, "Febrero", 60.0, "Marzo", 65.0, "Abril", 75.0, "Mayo", 85.0, "Junio", 50.0));
        Usuario usuario6 = new Usuario("Marta", "Ramirez", "43212312G", "martaramirez@gmail.com", 20, Map.of("Enero", 35.0, "Febrero", 0.0, "Marzo", 0.0, "Abril", 0.0, "Mayo", 50.0, "Junio", 0.0));
        Usuario usuario7 = new Usuario("Manolo", "Ibañez", "77712372H", "manoiba@gmail.com", 23, Map.of("Enero", 0.0, "Febrero", 20.0, "Marzo", 0.0, "Abril", 20.0, "Mayo", 0.0, "Junio", 30.0));  
        //Los guardo en una lista
        List<Usuario> usuarios = List.of(usuario1, usuario2, usuario3, usuario4, usuario5,usuario6,usuario7);
        //Devuelvo la lista de usuarios creada
        return usuarios;
    }

    //Método para calcular el total pagado por un usuario
    public double calcularTotalPagado(Map<String, Double> pagos) {
        double total = 0.0;
        for (double pago : pagos.values()) {
            total += pago;
        }
        return total;
    }

    //Método para comprobar si un usuario ha pagado todos los meses
    public boolean haPagadoTodosLosMeses(Map<String, Double> pagos) {
        for (double pago : pagos.values()) {
            if (pago == 0.0) {
                return false;
            }
        }
        return true;
    }

    //Codigo que ya estaba    
    private String nombre = "María";
    private int edad = 28;

    public String getNombre() {
        return nombre;
    }

    public int getEdad() {
        return edad;
    }

    public List<Producto> getProductos() {
        return  
        List.of(
            new Producto("Manzanas", 2.5),
            new Producto("Peras", 3.0),
            new Producto("Plátanos", 1.8)
        );
     //return "holas";   
    }

    // Clase interna para productos
    public static class Producto {
        private String nombre;
        private double precio;

        public Producto(String nombre, double precio) {
            this.nombre = nombre;
            this.precio = precio;
        }

        public String getNombre() { return nombre; }
        public double getPrecio() { return precio; }
    }
    
// Práctica 2: Crea aquí la clase que defina a un usuario
 //Clase Usuario
    public static class Usuario {
        private String nombre;
        private String apellidos;
        private String dni;
        private String email;
        private int edad;
        private Map<String, Double> pagos;

        public Usuario(String nombre,String apellidos,String dni,String email,int edad, Map<String, Double> pagos) {
            this.nombre = nombre;
            this.apellidos = apellidos;
            this.dni = dni;
            this.email = email;        
            this.edad = edad;
            this.pagos = pagos;
        }

        public String getNombre() { return nombre; }
        public String getApellidos() { return apellidos; }
        public String getDni() { return dni; }
        public String getEmail() { return email; }
        public int getEdad() { return edad; }
        public Map<String, Double> getPagos() { return pagos; }
    }  
   
}