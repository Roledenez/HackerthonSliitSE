/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package hackerthon.db.table;

import hackerthon.db.bean.EmployeeBean;
import hackerthon.db.bean.Item;
import hackerthon.db.config.DBType;
import hackerthon.db.config.DBUtil;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.JOptionPane;

/**
 *
 * @author srole_000
 */
public class EmployeeTable {
    
     public static EmployeeBean getRow(String username, String password) throws SQLException {
            String sql = "SELECT * FROM employee WHERE uname=? AND password=?";
        ResultSet rs = null;
        try(    Connection conn = DBUtil.getConnection(DBType.MYSQL);
                PreparedStatement stmt = conn.prepareStatement(sql);
                ){
                    stmt.setString(1, username);
                    stmt.setString(2, password);
                    rs = stmt.executeQuery();
                    
                    if(rs.next())
                    {
                      EmployeeBean bean = new EmployeeBean();
                      bean.setUsername(username);
                      bean.setId(rs.getInt("eid"));
                      bean.setPhone(rs.getString("phone"));
                      bean.setBirthday(rs.getString("dob"));
                      bean.setName(rs.getString("ename"));
                      bean.setRole(rs.getString("role"));
                      
                      return bean;
                    }else{
                    
                    return null;
                    }
                } catch(SQLException e){
                    System.err.println(e);
                    return null;
                } finally{
            if(rs!=null){
                rs.close();
            }
              
        }
    }

      public static boolean insert(EmployeeBean bean) throws Exception{
    
        String sql="INSERT INTO `employee`( `ename`, `phone`, `address`, `dob`, `uname`, `password`, `role`) "+
                   " VALUES (?,?,?,?,?,?,?);";
        ResultSet keys=null;
        try (
                Connection conn = DBUtil.getConnection(DBType.MYSQL);
                PreparedStatement stmt = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
             ){
            stmt.setString(1, bean.getName());            
            stmt.setString(2, bean.getPhone()); 
            stmt.setString(3, bean.getAddress()); 
            stmt.setString(4, bean.getBirthday()); 
            stmt.setString(5, bean.getUsername());
            stmt.setString(6, bean.getPassword()); 
            stmt.setString(7, bean.getRole()); 
//            stmt.setString(8, bean.getUnitPerBox()); 
            //stmt.setInt(9, bean.getCurrentStock()); 
           
            
            int affacted = stmt.executeUpdate();
            
            if(affacted==1){
               
            }else{
                JOptionPane.showMessageDialog(null, "Can't insert data", "Error", JOptionPane.ERROR_MESSAGE);
                return false;
            }
            
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            return false;
        } finally{
            if(keys!=null) keys.close();
        }
        return true;
    }
      
    
}
