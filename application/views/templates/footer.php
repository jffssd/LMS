    
	<footer class="footer">
  <span class="text-right">
  Todos os direitos reservados <a target="_blank" href="#">Carreira e-Sports!</a>
  </span>
  <span class="float-right">
  Desenvolvido por <a target="_blank" href="#"><b>jffssd</b></a>
  </span>
</footer>

</div>
<!-- END main -->

<script src="<?php echo base_url('assets/js/modernizr.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>
  
<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<script src="<?php echo base_url('assets/js/detect.js');?>"></script>
<script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.blockUI.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.filer.js');?>"></script>

<!-- App js -->
<script src="<?php echo base_url('assets/js/pikeadmin.js');?>"></script>

<!-- BEGIN Java Script for this page -->
<script src="<?php echo base_url('assets/js/Chart.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js');?>"></script>

<!-- Counter-Up-->
<script src="<?php echo base_url('assets/js/jquery.waypoints.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.counterup.min.js');?>"></script>			

<script>
  $(document).ready(function() {
    // data-tables
    $('#example1').DataTable();
        
    // counter-up
    $('.counter').counterUp({
      delay: 10,
      time: 600
    });
  } );		
</script>

<script>
var ctx1 = document.getElementById("lineChart").getContext('2d');
var lineChart = new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
        label: 'Dataset 1',
        backgroundColor: '#3EB9DC',
        data: [10, 14, 6, 7, 13, 9, 13, 16, 11, 8, 12, 9] 
      }, {
        label: 'Dataset 2',
        backgroundColor: '#EBEFF3',
        data: [12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]
      }]
      
  },
  options: {
          tooltips: {
            mode: 'index',
            intersect: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              stacked: true,
            }],
            yAxes: [{
              stacked: true
            }]
          }
        }
});


var ctx2 = document.getElementById("pieChart").getContext('2d');
var pieChart = new Chart(ctx2, {
  type: 'pie',
  data: {
      datasets: [{
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        label: 'Dataset 1'
      }],
      labels: [
        "Red",
        "Orange",
        "Yellow",
        "Green",
        "Blue"
      ]
    },
    options: {
      responsive: true
    }
 
});


var ctx3 = document.getElementById("doughnutChart").getContext('2d');
var doughnutChart = new Chart(ctx3, {
  type: 'doughnut',
  data: {
      datasets: [{
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        label: 'Dataset 1'
      }],
      labels: [
        "Red",
        "Orange",
        "Yellow",
        "Green",
        "Blue"
      ]
    },
    options: {
      responsive: true
    }
 
});
</script>
<!-- END Java Script for this page -->

</body>
</html>