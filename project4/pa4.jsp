
<%@page import="java.sql.*"%>  
<%
/*
Daniel Louis
Internet Systems Programming - Fall
Project 4
*/

//get the variables
String input = request.getParameter("action");


//create connection
Connection con;
Class.forName("com.mysql.jdbc.Driver").newInstance();
try { 
	// Open Database connection
	con = DriverManager.getConnection("jdbc:mysql://db1.cs.uakron.edu:3306/ISP_dtl29","dtl29","Pah8quei");

	if("display".equals(input))
	{

		// Query Database (all queries use the same connection)
		String sql1 =  "SELECT * FROM Corvettes";
		Statement stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(sql1);

		out.println("<head><stlye type =\"text/css\"> td, th, table {border: thin solid black;}</style></head>");
		out.println("<body>Cars() \n <br>");
		out.println("<table>\n<tbody>\n<tr align=\"center\">\n<th>Vette_id</th>\n<th>Body_Style</th>\n"
			+ "<th>Miles</th>\n<th>Year</th><th>State</th>\n</tr>\n");
		while(rs.next())
		{
			out.println("<tr align =\"center\"><th>"+ rs.getString("Vette_id") +"</th>\n<th>"
			+ rs.getString("Body_Style") + "</th>\n<th>" + rs.getString("Miles") + "</th>\n<th>"
			+ rs.getString("Year") + "</th>\n<th>" + rs.getString("State") + "</th>");
		}
		out.println("</body>");
	}
	if("update".equals(input))
	{
	
	}
	if("delete".equals(input))
	{
	
	}
	if("user".equals(input))
	{
		String statement = request.getParameter("statement");
		// Query Database (all queries use the same connection)
		String sql1 =  statement;
		Statement stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(sql1);
	}
	// Finished using the database instances
	//rs.close();
	//stmt.close();
	con.close();
}

catch (Exception e)
{
	out.println(e.toString());  // Error message to display
}

%>
