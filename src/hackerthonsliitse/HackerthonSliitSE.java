/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package hackerthonsliitse;

import hackerthon.db.bean.PatientBean;
import hackerthon.db.table.PatientTable;
import java.sql.SQLException;

/**
 *
 * @author srole_000
 */
public class HackerthonSliitSE {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws SQLException {
        // TODO code application logic here
        PatientBean bean = PatientTable.getRow(1);
        System.out.println(bean.getAddress());
         System.out.println(bean.getAge());
         System.out.println(bean.getName());
         System.out.println(bean.getPid());

                                
    }
    
}
