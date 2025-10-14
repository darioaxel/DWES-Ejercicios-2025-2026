package es.dwes.UT03;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.*;
import java.sql.*;

@WebServlet("/articulos")
public class ArticulosServlet extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter();
             Connection con = DriverManager.getConnection(
                 "jdbc:postgresql://localhost:5432/articulos", "alumno", "alumno");
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery("SELECT fecha, titulo FROM articulo")) {

            out.println("<h1>Listado de Artículos</h1>");
            out.println("<table><tr><th>Fecha</th><th>Título</th></tr>");
            while (rs.next()) {
                out.println("<tr><td>" + rs.getDate("fecha") + "</td><td>" + rs.getString("titulo") + "</td></tr>");
            }
            out.println("</table>");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
