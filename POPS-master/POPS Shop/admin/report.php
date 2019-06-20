<head>
<style>
body {
    font-family: "Lato", sans-serif;
}
    
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #f1f1f1;
  display: inline-block;
  border: #F8694A;
  overflow-x: hidden;
  padding-top: 20px;
}
    
.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  border: #F8694A;
  display: block;
}

.sidenav a:hover {
  color: black;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #000000;
  text-align: left;
  padding: 8px;
}



tr {
  background-color: #dddddd;
}
</style>
</head>
<body>

<div class="sidenav">
    <a href="createCustomerAccount.php">Create Customer Account</a>
    <a href="createAdminAccount.php">Create Admin Account</a>
    <a href="viewCustomer.php">View Customer Account</a>
    <a href="viewAdmin.php">View Admin Account</a>
    <a href="viewProducts.php">View Products</a>
    <a href="newProduct.php">Add New Product</a>
    <a href="viewOrders.php">View Orders</a>
    <a href="createReport.php">Create Reports</a>
    <a href="logoutAdmin.php">Logout</a>
  </div> 
  <div class="main">

  <?php
    include '../conection.php';
    include 'sessionAdmin.php';
    if(isset($_POST['submit']))
	  { 
      $reportType = $_POST['report']; // Que tipo de reporte es
      $groupByReport = $_POST['date']; // Que tipo de reporte si  es por semana dia o mes
      $daySale = $_POST['daySale'];
      $weekstartSale = $_POST['weekStartSale'];
      $weekendSale = $_POST['weekEndSale'];
      $monthlySale = $_POST['monthSale'];
      $dayRevenue = $_POST['dayRevenue'];
      $weekstartRevenue = $_POST['weekStartRevenue'];
      $weekendRevenue = $_POST['weekEndRevenue'];
      $monthlyRevenue = $_POST['monthRevenue'];
    //SALES
    
      if($reportType  == "allSales")
      {
        echo"<h1>Report of total sales by day, week and month</h1>";
        echo"
        <table>
        <tr>
            <th>Day</th>
            <th>Sales</th>
        </tr>";
        
        //Query that Reports total sales by day
        $get_reportDateSaleDay = "SELECT DATE(Order_Date) AS Date, sum(Order_Data.Price_per_Pop * Item_Quantity) as Sales 
        from Order_Data
        inner join  pop_products using (Item_Id)
        NATURAL JOIN Orders
        GROUP BY DATE(Order_Date) ORDER BY DATE(Order_Date)";

        //$get_reportDateSaleDay = "SELECT sum(Price * Item_Quantity) from Orders where Order_Date like ('%$allSales%') GROUP BY Order_Date"; // dia
        $run_reportDateSaleDay = mysqli_query($con, $get_reportDateSaleDay);

        while($row_reportDateSaleDay = mysqli_fetch_array($run_reportDateSaleDay))
        {
          $orderDateDay = $row_reportDateSaleDay['Date'];
          $orderSaleDay = $row_reportDateSaleDay['Sales'];
  
          echo"
          <tr>
            <td>$orderDateDay&nbsp;&nbsp;&nbsp;</td>
            <td>$$orderSaleDay</td>
          </tr>
          ";

         
        
        }
        //WEEK

        echo"
        <table>
        <tr>
            <th>Week</th>
            <th>Sales</th>
        </tr>";
        //Query that Reports total sales by week
        $get_reportDateSaleWeek =  "SELECT WEEK(Order_Date) AS Week, YEAR(Order_Date) AS Year, sum(Order_Data.Price_per_Pop * Item_Quantity) as Sales 
                                    from Order_Data inner join pop_products using (Item_Id) NATURAL JOIN Orders
                                    GROUP BY YEARWEEK(Order_Date) ORDER BY DATE(Order_Date)";

        $run_reportDateSaleWeek= mysqli_query($con, $get_reportDateSaleWeek);
        
        while($row_reportDateSaleWeek = mysqli_fetch_array($run_reportDateSaleWeek))
        {
          $orderDateWeek = $row_reportDateSaleWeek['Week'];
          $orderDateYear= $row_reportDateSaleWeek['Year'];
          $orderDateSaleWeek= $row_reportDateSaleWeek['Sales'];

          echo"
          <tr>
            <td>$orderDateWeek-$orderDateYear&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>$$orderDateSaleWeek</td>
          </tr>
          ";
        }

        //MONTH
        echo"
        <table>
        <tr>
            <th>Month</th>
            <th>Sales</th>
        </tr>";
        //Query that Reports total sales by month

        $get_reportDateSaleMonth = "SELECT MONTHNAME(Order_Date) AS Month, YEAR(Order_Date) AS Year, sum(Order_Data.Price_per_Pop * Item_Quantity) as Sales 
                                    from Order_Data inner join pop_products using (Item_Id) NATURAL JOIN Orders
                                    GROUP BY EXTRACT(YEAR_MONTH FROM Order_Date) ORDER BY DATE(Order_Date)";

        $run_reportDateSaleMonth= mysqli_query($con, $get_reportDateSaleMonth);
        

        while($row_reportDateSaleMonth = mysqli_fetch_array($run_reportDateSaleMonth))
        {
          $DateMonth = $row_reportDateSaleMonth['Month'];
          $DateYear= $row_reportDateSaleMonth['Year'];
          $DateSaleMonth = $row_reportDateSaleMonth['Sales'];

          echo"
          <tr>
            <td>$DateMonth-$DateYear&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>$$DateSaleMonth</td>
          </tr>";
       }

      }

      //REVENUE
      else if($reportType  == "allRevenue") 
      {
        echo"<h1>Report of total revenue by day, week and month</h1>";
        echo"
        <table>
        <tr>
            <th>Day</th>
            <th>Revenues</th>
        </tr>";
        
        //DAY
        $get_reportDateRevenueDay =  "SELECT DATE(Order_Date) AS Date, sum(Order_Data.Price_per_Pop * Item_Quantity - Distributor_Price * Item_Quantity) as Revenues 
        from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
        GROUP BY DATE(Order_Date) ORDER BY DATE(Order_Date)"; // dia

        $run_reportDateRevenueDay = mysqli_query($con, $get_reportDateRevenueDay);
       
        while($row_reportDateRevenueDay = mysqli_fetch_array($run_reportDateRevenueDay))
        {
          $DateDay = $row_reportDateRevenueDay['Date'];
          $DateRevenueDay = $row_reportDateRevenueDay['Revenues'];

          echo"
          <tr>
            <td>$DateDay</td>
            <td>$$DateRevenueDay</td>
          </tr>
          ";

        }
       
        //WEEK
        echo"
        <table>
        <tr>
            <th>Week</th>
            <th>Revenues</th>
        </tr>";
        $get_reportDateRevenueWeek =  "SELECT WEEK(Order_Date) AS Week, YEAR(Order_Date) AS Year, sum(Order_Data.Price_per_Pop * Item_Quantity - Distributor_Price * Item_Quantity) as Revenues 
        from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
        GROUP BY YEARWEEK(Order_Date) ORDER BY DATE(Order_Date)"; // week
        $run_reportDateRevenueWeek= mysqli_query($con, $get_reportDateRevenueWeek);

        while($row_reportDateRevenueWeek = mysqli_fetch_array($run_reportDateRevenueWeek))
        {
          $DateWeek = $row_reportDateRevenueWeek['Week'];
          $DateYear= $row_reportDateRevenueWeek['Year'];
          $DateRevenueWeek = $row_reportDateRevenueWeek['Revenues'];

          echo"
          <tr>
            <td>$DateWeek-$DateYear&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>$$DateRevenueWeek</td>
          </tr>
          ";
          
        }

        //MONTH
        echo"
        <table>
        <tr>
            <th>Month</th>
            <th>Revenues</th>
        </tr>";

        $get_reportDateRevenueMonth =  "SELECT MONTHNAME(Order_Date) AS Month, YEAR(Order_Date) AS Year, sum(Order_Data.Price_per_Pop * Item_Quantity - Distributor_Price * Item_Quantity) as Revenues 
        from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
        GROUP BY EXTRACT(YEAR_MONTH FROM Order_Date) ORDER BY DATE(Order_Date)"; // month
        $run_reportDateRevenueMonth= mysqli_query($con, $get_reportDateRevenueMonth);

        while($row_reportDateRevenueMonth = mysqli_fetch_array($run_reportDateRevenueMonth))
        {
          $DateMonth = $row_reportDateRevenueMonth['Month'];
          $DateYear= $row_reportDateRevenueMonth['Year'];
          $DateRevenueMonth = $row_reportDateRevenueMonth['Revenues'];

          echo"
          <tr>
            <td>$DateMonth-$DateYear&nbsp;&nbsp;</td>
            <td>$$DateRevenueMonth</td>
          </tr>";
       } 
        
      }

      else if($reportType  == "groupBySale")
      { 
        if($groupByReport == "daySale")
        {
          echo"
          <table>
            <tr>
              <th>Item Sale</th>
              <th>Sale</th>
            </tr>";
          echo"<h1>Report of total sales grouped by product for Day: $daySale</h1>";
          $get_reportDateSale = "SELECT pop_products.Item_Name, sum(Order_Data.Price_per_Pop * Item_Quantity) as Sales
                                 from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
                                 where Order_Date like ('%$daySale%') GROUP BY Order_Data.Item_ID";
          $run_reportDateSale = mysqli_query($con, $get_reportDateSale);

          while($row_reportDateSale = mysqli_fetch_array($run_reportDateSale))
          {
            $saleItem = $row_reportDateSale['Item_Name'];
            $sale = $row_reportDateSale['Sales'];
                
            echo"
            <tr>
              <td>$saleItem</td>
              <td>$$sale</td>
            </tr>";
            
          }
            
        }
          
        else if($groupByReport == "weekSale")
        {
          echo"<h1>Report of total sales grouped by product for Week: $weekstartSale - $weekendSale</h1>";
          echo"
          <table>
            <tr>
              <th>Item Sale</th>
              <th>Sale</th>
            </tr>";
          $get_reportWeekSale = "SELECT pop_products.Item_Name, sum(Order_Data.Price_per_Pop * Item_Quantity) as Sales 
                                 from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
                                 where DATE(Order_Date) >= '$weekstartSale' and DATE(Order_Date) <= '$weekendSale' 
                                 GROUP BY Order_Data.Item_ID ORDER BY Order_Data.Item_ID";
          
          $run_reportWeekSale = mysqli_query($con, $get_reportWeekSale);
        
          while($row_reportWeekSale = mysqli_fetch_array($run_reportWeekSale))
          {
            $saleItem = $row_reportWeekSale['Item_Name'];
            $weekSale = $row_reportWeekSale['Sales'];
            
            echo"
            <tr>
              <td>$saleItem</td>
              <td>$$weekSale</td>
            </tr>";
 
          }
        }

        else if($groupByReport == "monthSale")
        {
          echo"<h1>Report of total sales grouped by product for Month: $monthlySale</h1>";
          echo"
          <table>
            <tr>
              <th>Item Sale</th>
              <th>Sale</th>
            </tr>";
          $get_reportMonthSale = "SELECT pop_products.Item_Name, sum(Order_Data.Price_per_Pop * Item_Quantity) AS Sales
                                  from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
                                  where Order_Date like ('%$monthlySale%') GROUP BY Item_ID";
          //$get_reportMonthSale = "select sum(Price * Item_Quantity) from Orders where Order_Date like ('%$monthlySale%') GROUP BY Item_ID "; 
          $run_reportMonthSale = mysqli_query($con, $get_reportMonthSale);
      
          while($row_reportMonthSale = mysqli_fetch_array($run_reportMonthSale))
          {
            $saleItem = $row_reportMonthSale['Item_Name'];
            $monthSale = $row_reportMonthSale['Sales'];

            echo"
             <tr>
               <td>$saleItem</td>
               <td>$$monthSale</td>
             </tr>";
          }
        }
      }

      else if($reportType  == "groupByRevenue")
      {
        if($groupByReport == "dayRevenue")
          {
            echo"<h1>Report of total Revenue grouped by product for Day: $dayRevenue</h1>";
            echo"
          <table>
            <tr>
              <th>Item Sale</th>
              <th>Revenue</th>
            </tr>";
            $get_reportDateRevenue = "SELECT pop_products.Item_Name, sum(Order_Data.Price_per_Pop * Item_Quantity - Distributor_Price * Item_Quantity) as Revenues
            from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
            where Order_Date like ('%$dayRevenue%') GROUP BY Order_Data.Item_ID";

            $run_reportDateRevenue = mysqli_query($con, $get_reportDateRevenue);
            
            while($row_reportDateRevenue = mysqli_fetch_array($run_reportDateRevenue))
            {
              $saleItem = $row_reportDateRevenue['Item_Name'];
              $dayRevenue = $row_reportDateRevenue['Revenues'];
              echo"
             <tr>
               <td>$saleItem</td>
               <td>$$dayRevenue</td>
             </tr>"; 
               
            }
          }
          else if($groupByReport == "weekRevenue")
          {
            echo"<h1>Report of total Revenue grouped by product for Week: $weekstartRevenue - $weekendRevenue</h1>";
            echo"
            <table>
              <tr>
               <th>Item Sale</th>
                <th>Revenue</th>
              </tr>";
            $get_reportWeekRevenue = "SELECT pop_products.Item_Name, sum(Order_Data.Price_per_Pop * Item_Quantity - Distributor_Price * Item_Quantity) as Revenues 
            from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
            where DATE(Order_Date) >= '$weekstartRevenue' and DATE(Order_Date) <= '$weekendRevenue' 
            GROUP BY Order_Data.Item_ID ORDER BY Item_ID";
            $run_reportWeekRevenue = mysqli_query($con, $get_reportWeekRevenue);

            while($row_reportWeekRevenue = mysqli_fetch_array($run_reportWeekRevenue))
            {
              $saleItem = $row_reportWeekRevenue['Item_Name'];
              $weekRevenue = $row_reportWeekRevenue['Revenues'];
              
              echo"
             <tr>
               <td>$saleItem</td>
               <td>$$weekRevenue</td>
             </tr>";
      
            }

           
          }
          else if($groupByReport == "monthRevenue")
          {
            echo"<h1>Report of total Revenue grouped by product for Month: $monthlyRevenue</h1>";
            echo"
            <table>
              <tr>
               <th>Item Sale</th>
                <th>Revenue</th>
              </tr>";
            $get_reportMonthRevenue = "SELECT pop_products.Item_Name, sum(Order_Data.Price_per_Pop * Item_Quantity - Distributor_Price * Item_Quantity) AS Revenues
            from Order_Data inner join  pop_products using (Item_Id) NATURAL JOIN Orders
            where Order_Date like ('%$monthlyRevenue%') GROUP BY Item_ID";
            $run_reportMonthRevenue = mysqli_query($con, $get_reportMonthRevenue);
            while($row_reportMonthRevenue = mysqli_fetch_array($run_reportMonthRevenue))
            {
              $saleItem = $row_reportMonthRevenue['Item_Name'];
              $monthRevenue = $row_reportMonthRevenue['Revenues'];

              echo"
              <tr>
              <td>$saleItem</td>
              <td>$$monthRevenue</td>
              </tr>";
            }
          }
        } 
       }
?>		
</table>
</body>