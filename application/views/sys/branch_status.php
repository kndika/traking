<div class="container mt-5">
  <h2>Branch Status</h2>
  <table class="table mt-4">
    <thead>
      <tr>
        <th>Branch name</th>
        <th>Finish</th>
        <th>Pending</th>
      </tr>
    </thead>
    <tbody>
         <?php foreach($br_list as $ul){  ?>
      <tr>
        <td><?php echo $ul->branch_name?></td>
        <td><?php echo $this->db->where('status','2')->where('branch',$ul->branch_cord)->count_all_results('package_details');?></td>
        <td><?php echo $this->db->where('status','1')->where('branch',$ul->branch_cord)->count_all_results('package_details');?></td>
      </tr>      
         <?php }?>
    </tbody>
  </table>
</div>