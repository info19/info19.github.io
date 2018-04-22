<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_9") ?></li>
</ol>

<?php echo form_open("admin/block_ip/", array("class" => "form-inline", "role" => "form")) ?>
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail2"><?php echo lang("actn_44") ?></label>
    <input type="text" class="form-control" name="ip" id="exampleInputEmail2" placeholder="<?php echo lang("actn_45") ?>">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail1"><?php echo lang("actn_46") ?></label>
    <input type="text" class="form-control" name="reason" id="exampleInputEmail1" placeholder="Note">
  </div>
  <button type="submit" class="btn btn-default"><?php echo lang("actn_47") ?></button>
<?php echo form_close() ?>

<br />
<table width="100%" class='table table-bordered'>
	<tr><td class="col-md-2"><b><?php echo lang("actn_44") ?></b></td><td class="col-md-3"><b><?php echo lang("actn_46") ?></b></td><td class="col-md-2"><b><?php echo lang("actn_48") ?></b></td><td class="col-md-2"><b><?php echo lang("actn_49") ?></b></td></tr>
	<?php
		foreach($ips->result() as $r) {
			echo"<tr class='table-row'><td>{$r->IP}</td><td>{$r->reason}</td><td>".date("m-d-Y", $r->timestamp)."</td><td><a href='".base_url("admin/delete_ip/" . $r->ID . "/" . $this->security->get_csrf_hash())."'>". lang("actn_50") ."</a></td></tr>";
		}
	?>
</table>
<?php echo $this->pagination->create_links(); ?>