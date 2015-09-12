/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package hackerthon.db.table;

import hackerthon.db.bean.EmployeeBean;
import hackerthon.db.config.DBType;
import hackerthon.db.config.DBUtil;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

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

    
}
