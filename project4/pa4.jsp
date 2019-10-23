
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

		out.println("<head><style type =\"text/css\"> td, th, table {border: thin solid black;}</style></head>");
		out.println("<body><caption><h2>Cars() \n </h2></caption>");
		out.println("<table>\n<tbody>\n<tr align=\"center\">\n<th>Vette_id</th>\n<th>Body_Style</th>\n"
			+ "<th>Miles</th>\n<th>Year</th><th>State</th>\n</tr>\n");
		while(rs.next())
		{
			out.println("<tr align =\"center\"><th>"+ rs.getString("Vette_id") +"</th>\n<th>"
				+ rs.getString("Body_Style") + "</th>\n<th>" + rs.getString("Miles") + "</th>\n<th>"
				+ rs.getString("Year") + "</th>\n<th>" + rs.getString("State") + "</th>");
		}
		out.println("</body>");
		rs.close();
		stmt.close();
	}
	if("insert".equals(input))
	{
		String id = request.getParameter("id");
		String type = request.getParameter("type");
		String miles = request.getParameter("miles");
		String year = request.getParameter("year");
		String state = request.getParameter("state");
		
		// Query Database (all queries use the same connection)
		String sql1 =  "INSERT INTO Corvettes(Vette_id, Body_style, Miles, Year, State)"
			+ "VALUES(" + id + ", \'" + type + "\', " + miles + ", " + year + ", \'" + state 
			+ "\')" ;
		Statement stmt = con.createStatement();
		stmt.executeUpdate(sql1);

		// Query Database (all queries use the same connection)
		sql1 =  "SELECT * FROM Corvettes";
		stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(sql1);

		out.println("<head><style type =\"text/css\"> td, th, table {border: thin solid black;}</style></head>");
		out.println("<body><caption><h2>Cars() \n </h2></caption>");
		out.println("<table>\n<tbody>\n<tr align=\"center\">\n<th>Vette_id</th>\n<th>Body_Style</th>\n"
			+ "<th>Miles</th>\n<th>Year</th><th>State</th>\n</tr>\n");
		while(rs.next())
		{
			out.println("<tr align =\"center\"><th>"+ rs.getString("Vette_id") +"</th>\n<th>"
				+ rs.getString("Body_Style") + "</th>\n<th>" + rs.getString("Miles") + "</th>\n<th>"
				+ rs.getString("Year") + "</th>\n<th>" + rs.getString("State") + "</th>");
		}
		out.println("</body>");
		rs.close();
		stmt.close();
		
	}
	if("update".equals(input))
	{
		String id = request.getParameter("id");
		String type = request.getParameter("type");
		String miles = request.getParameter("miles");
		String year = request.getParameter("year");
		String state = request.getParameter("state");
		
		// Query Database (all queries use the same connection)
		String sql1 =  "UPDATE Corvettes SET Vette_id =" + id + ", Body_style = \'" + type + "\', Miles = "
			+ miles + ", Year = " + year + ", State = \'" + state + "\'"
			+ "WHERE Vette_id = " + id;
		Statement stmt = con.createStatement();
		stmt.executeUpdate(sql1);

		// Query Database (all queries use the same connection)
		sql1 =  "SELECT * FROM Corvettes";
		stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(sql1);

		out.println("<head><style type =\"text/css\"> td, th, table {border: thin solid black;}</style></head>");
		out.println("<body><caption><h2>Cars() \n </h2></caption>");
		out.println("<table>\n<tbody>\n<tr align=\"center\">\n<th>Vette_id</th>\n<th>Body_Style</th>\n"
			+ "<th>Miles</th>\n<th>Year</th><th>State</th>\n</tr>\n");
		while(rs.next())
		{
			out.println("<tr align =\"center\"><th>"+ rs.getString("Vette_id") +"</th>\n<th>"
				+ rs.getString("Body_Style") + "</th>\n<th>" + rs.getString("Miles") + "</th>\n<th>"
				+ rs.getString("Year") + "</th>\n<th>" + rs.getString("State") + "</th>");
		}
		out.println("</body>");
		rs.close();
		stmt.close();
	}
	if("delete".equals(input))
	{
		String toDelete = request.getParameter("id");
		// Query Database (all queries use the same connection)
		String sql1 =  "DELETE FROM Corvettes WHERE Vette_id =" + toDelete;
		Statement stmt = con.createStatement();
		stmt.executeUpdate(sql1);

		// Query Database (all queries use the same connection)
		sql1 =  "SELECT * FROM Corvettes";
		stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(sql1);

		out.println("<head><style type =\"text/css\"> td, th, table {border: thin solid black;}</style></head>");
		out.println("<body><caption><h2>Cars() \n </h2></caption>");
		out.println("<table>\n<tbody>\n<tr align=\"center\">\n<th>Vette_id</th>\n<th>Body_Style</th>\n"
			+ "<th>Miles</th>\n<th>Year</th><th>State</th>\n</tr>\n");
		while(rs.next())
		{
			out.println("<tr align =\"center\"><th>"+ rs.getString("Vette_id") +"</th>\n<th>"
				+ rs.getString("Body_Style") + "</th>\n<th>" + rs.getString("Miles") + "</th>\n<th>"
				+ rs.getString("Year") + "</th>\n<th>" + rs.getString("State") + "</th>");
		}
		out.println("</body>");
		rs.close();
		stmt.close();
	}
	if("user".equals(input))
	{
		String statement = request.getParameter("statement");
		// Query Database (all queries use the same connection)
		String sql1 =  statement;
		Statement stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(sql1);
		out.println("<b>The query is: </b>" + statement);
		stmt.close();

		// Query Database (all queries use the same connection)
		sql1 =  "SELECT * FROM Corvettes";
		stmt = con.createStatement();
		rs = stmt.executeQuery(sql1);

		out.println("<head><style type =\"text/css\"> td, th, table {border: thin solid black;}</style></head>");
		out.println("<body><caption><h2>Cars() \n </h2></caption>");
		out.println("<table>\n<tbody>\n<tr align=\"center\">\n<th>Vette_id</th>\n<th>Body_Style</th>\n"
			+ "<th>Miles</th>\n<th>Year</th><th>State</th>\n</tr>\n");
		while(rs.next())
		{
			out.println("<tr align =\"center\"><th>"+ rs.getString("Vette_id") +"</th>\n<th>"
				+ rs.getString("Body_Style") + "</th>\n<th>" + rs.getString("Miles") + "</th>\n<th>"
				+ rs.getString("Year") + "</th>\n<th>" + rs.getString("State") + "</th>");
		}
		out.println("</body>");
		rs.close();
		stmt.close();
	}
	// Finished using the database instances
	con.close();
}

catch (Exception e)
{
	out.println(e.toString());  // Error message to display
}

%>
