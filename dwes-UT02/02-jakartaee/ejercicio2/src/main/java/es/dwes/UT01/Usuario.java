package es.dwes.UT01;

import java.io.Serializable;
import java.util.Map;

public class Usuario implements Serializable {

    private String nombre;
    private String apellidos;
    private String dni;
    private String email;
    private int edad;
    private Map<String, Double> pagos;

    public Usuario(String nombre, String apellidos, String dni, String email, int edad, Map<String, Double> pagos) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.dni = dni;
        this.email = email;
        this.edad = edad;
        this.pagos = pagos;
    }

    public String getNombre() {
        return nombre;
    }

    public String getApellidos() {
        return apellidos;
    }

    public String getDni() {
        return dni;
    }

    public String getEmail() {
        return email;
    }

    public int getEdad() {
        return edad;
    }

    public Map<String, Double> getPagos() {
        return pagos;
    }

    // Total anual de pagos
    public Double getTotal() {
        if (pagos == null)
            return 0.0;
        return pagos.values()
                .stream()
                .filter(v -> v != null)
                .mapToDouble(Double::doubleValue)
                .sum();
    }

    // Getter adicional para JSF
    public Double getTotalPagos() {
        return getTotal();
    }

    // Indica si el usuario está al corriente
    public boolean isAlCorriente() {
        return getTotal() >= 100;
    }
}
