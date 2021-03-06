<?php
/* @var $this TemplesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Temples',
);

$this->menu=array(
);
?>
<style type="text/css">
.pull-left{ float:left; }
.pull-right{ float:right; }

.filtersmanagesectionpart {
    background-color: #CCCCCC;
    border-radius: 5px;
    display: table;
    padding: 5px;
	float:left; margin-right:10px;
	margin-bottom: 10px;
}

.filtersmanagesectionpart .pull-right{
margin-left:10px;
}

.filtersmanagesection {
    clear: both;
    display: table;
}
</style>

<?php 
$urladditional = '';
if(isset($_REQUEST['cid']) && trim($_REQUEST['cid']) != ''){ 
$urladditional = '/cid/'.$_REQUEST['cid'];
}

//validAfterDatepicker
$categories =Temples::model()->getall(); 
           $categoriesvalues = array();
		   $states = States::model()->getall(); 
		   $statesvalues = array();
		   $languages = Languages::model()->getall(); 
		   $languagesvalues = array();
		   $services = Services::model()->getall(); 
		   $whours = array('0_3'=>'0 - 3 hours','3_5'=>'3 - 5 hours','5_7'=>'5 - 7 hours','7_24'=>'Full Day(7+ hours)');
		   $whoursvalues = array('0_3'=>0,'3_5'=>0,'5_7'=>0,'7_24'=>0);
			
			$amounts = array('0_500'=>'0 - 500 Rs','500_1000'=>'500 - 1000 Rs','1000_1500'=>'1000 - 1500 Rs','1500_15000000'=>'Above 1500 Rs');
		    $amountsvalues = array('0_500'=>0,'500_1000'=>0,'1000_1500'=>0,'1500_15000000'=>0);
			
			$exparr = array('0_1'=>'Below 1 year', '1_2'=>'1-2 years ', '2_5'=>'2-5 years ', '5_1000'=>'Above 5 years'); 
			$exparrvalues = array('0_1'=>0, '1_2'=>0, '2_5'=>0, '5_1000'=>0); 
		
		   if(isset($dataProvider->rawData) && count($dataProvider->rawData)){
		      foreach($dataProvider->rawData as $items){
			  $items->guidemoredetails = Guide::model()->find('user_id=:user_id',array(':user_id'=>$items->user_id));
			 
			/*     if(isset( $categoriesvalues[$items->guidemoredetails->guide_categories]) )
				 $categoriesvalues[$items->guidemoredetails->guide_categories] = (int)$categoriesvalues[$items->guidemoredetails->guide_categories]+1;
				 else
				 $categoriesvalues[$items->guidemoredetails->guide_categories] = 1;*/
				 
				 
				$guidecategories = explode(',',$items->guidemoredetails->guide_categories);
	

				
				foreach($categories as  $category){
					if(in_array($category->id, $guidecategories)){
						 if(isset( $categoriesvalues[$category->id]) )
						 $categoriesvalues[$category->id] = (int)$categoriesvalues[$category->id]+1;
						 else
						 $categoriesvalues[$category->id] = 1;
					}
				}
				
				
				 
				 
				 if(isset( $languagesvalues[$items->language]) )
				 $languagesvalues[$items->language] = (int)$languagesvalues[$items->language]+1;
				 else
				 $languagesvalues[$items->language] = 1;
				 
				 
				 if((float)$items->guidemoredetails->guide_experience>=0 && (float)$items->guidemoredetails->guide_experience<1)
				  $exparrvalues['0_1'] = $exparrvalues['0_1']+1;
				  else if((float)$items->guidemoredetails->guide_experience>=1 && (float)$items->guidemoredetails->guide_experience<2)
				  $exparrvalues['1_2'] = $exparrvalues['1_2']+1;
				  else if((float)$items->guidemoredetails->guide_experience>=2 && (float)$items->guidemoredetails->guide_experience<5)
				  $exparrvalues['2_5'] = $exparrvalues['2_5']+1;
				  else if((float)$items->guidemoredetails->guide_experience>=5)
				  $exparrvalues['5_1000'] = $exparrvalues['5_1000']+1;
				 
				 
				 if((int)$items->guidemoredetails->guide_wh>=0 && (int)$items->guidemoredetails->guide_wh<3)
				  $whoursvalues['0_3'] = $whoursvalues['0_3']+1;
				  else if((int)$items->guidemoredetails->guide_wh>=3 && (int)$items->guidemoredetails->guide_wh<5)
				  $whoursvalues['3_5'] = $whoursvalues['3_5']+1;
				  else if((int)$items->guidemoredetails->guide_wh>=5 && (int)$items->guidemoredetails->guide_wh<7)
				  $whoursvalues['5_7'] = $whoursvalues['5_7']+1;
				  else if((int)$items->guidemoredetails->guide_wh>=7 && (int)$items->guidemoredetails->guide_wh<25)
				  $whoursvalues['7_24'] = $whoursvalues['7_24']+1;
				  
				  
				   if((float)$items->guidemoredetails->guide_amount>=0 && (float)$items->guidemoredetails->guide_amount<500)
				  $amountsvalues['0_500'] = $amountsvalues['0_500']+1;
				  else if((float)$items->guidemoredetails->guide_amount>=500 && (float)$items->guidemoredetails->guide_amount<1000)
				  $amountsvalues['500_1000'] = $amountsvalues['500_1000']+1;
				  else if((float)$items->guidemoredetails->guide_amount>=1000 && (float)$items->guidemoredetails->guide_amount<1500)
				  $amountsvalues['1000_1500'] = $amountsvalues['1000_1500']+1;
				  else if((float)$items->guidemoredetails->guide_amount>=1500)
				  $amountsvalues['1500_15000000'] = $amountsvalues['1500_15000000']+1;
				  
				  
				  
				  
				  
				  
				  if(isset( $languagesvalues[$items->language]) )
				 $languagesvalues[$items->language] = (int)$languagesvalues[$items->language]+1;
				 else
				 $languagesvalues[$items->language] = 1;
				 
				 
				 
				 if(isset( $statesvalues[$items->guidemoredetails->guide_state]) )
				 $statesvalues[$items->guidemoredetails->guide_state] = (int)$statesvalues[$items->guidemoredetails->guide_state]+1;
				 else
				 $statesvalues[$items->guidemoredetails->guide_state] = 1;
				 
			  }
		   }


?>
<div id="maincontent">
<div class="wrapper">
   <h3 class="epooja">Guides</h3>
 </div> 

             
               
               
  
  <div id="subcats-holder">
    <div class="wrapper">

		
			   <form class="wp-user-form" action="" method="post" style=" margin-bottom:30px; margin-top:25px;">
					    <div class="wrapper">
							
<div class="sc-column one-half">
	
						<!--<select name="directory-role" style="padding:2%; width:30%">
						<option class="free" value="directory_1">Dharshan</option>
						<option class="free" value="directory_2">Pooja</option>
						<option class="free" value="directory_3">Prasad</option>
						<option class="free" value="directory_4">Products</option>
						</select>-->


						<input type="text" style="padding:2%; width:35%;" placeholder="Search Keyword..." name="title" class="filteritem" value="<?php echo isset($_REQUEST['title'])?$_REQUEST['title']:''; ?>" id="title">
						<span class="dir-searchsubmit" id="directory-search">
						<input type="button" value="Search" class="dir-searchsubmit" style="margin-left:5px; width:20%; font-size:14px;" onclick="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')">
						</span>
						
</div>

<!--<div class="sc-column one-half right" style="float:right;margin-top:12px;">-->
<div style="margin-top: 16px;width: 24%;"  id="pagin">
<div class="pagination">
<!--    <ul>
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
	<li><a href="#">..</a></li>
    <li><a href="#">&raquo;</a></li>
    </ul>-->
	&nbsp;
    </div>
	</div>
	
						
</form>

<br>
	
	
	
      <div class="sc-column one-fourth subcats-holder" style="border-radius:5px;">  
		           
      <ul class="sc-list " style="">
		  
		  
		 


<li>
 <h6 style="background-color:#EBEBEB;padding: 10px;border-radius:1px;margin-top:-10px;"><a href="#" class="item-title"><strong>Date</strong></a></h6>
 <div class="onecolumn" style="" id="date-column">
	 
	<form class="wp-user-form" action="" method="post" style=" margin-bottom:30px; margin-top:15px;">
					    <div class="wrapper">
							
<div class="sc-column one-half">
	

						<input type="text" style="padding:1%; width:13%;" placeholder="from" id="fromdate" name="fromdate" class="filteritem" onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" value="<?php echo isset($_REQUEST['fromdate'])?$_REQUEST['fromdate']:''; ?>"><span style="margin-right: 15px;" class="connector">-</span>
						<input type="text" style="padding:1%; width:13%;" placeholder="to" id="todate" name="todate" class="filteritem" onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" value="<?php echo isset($_REQUEST['todate'])?$_REQUEST['todate']:''; ?>">
						

</div>

</div></form>

          </div>                       
       
</li>

		  
		  
<li>
       
 <h6 style="background-color:#EBEBEB;padding: 10px;margin-top:-10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a href="#" class="item-title" ><strong>Categories</strong></a></h6>
 <div class="onecolumn">
          <div class="one-third" style="padding: 9px;">

			<?php foreach( $categories as  $category){ ?>		 
			<label class="<?php echo (isset( $categoriesvalues[$category->id])?'':'filterhidden'); ?>">
			<input type="radio" class="language-filters filteritem category-filter" value="<?php echo $category->id; ?>" id="lang-filters-29" name="categories" onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" <?php if(isset($_REQUEST['categories']) && in_array($category->id,array($_REQUEST['categories']))){ ?> checked="checked" <?php } ?>>
			<span class="flag flag-gb"></span>
			<span><?php echo $category->temple_name; ?></span>
			<span class="language-filter-count filter-count-hidden" style="display: inline;">(<?php echo (isset( $categoriesvalues[$category->id])?$categoriesvalues[$category->id]:'0'); ?>)</span>
			</label><br>
			<?php } ?>
				 

            
          </div>
          
        </div>        
        <br />        
</li>


<li> 
 <h6 style="background-color:#EBEBEB;padding: 10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a href="javascript:void(0);" class="item-title"><strong>Experience</strong></a></h6>
 <div class="onecolumn">
          <div class="one-fourth" style="padding:9px;"> 
		 
                 <?php foreach( $exparr as $expkey=>$exp){ ?>		 
			<label class="<?php echo (isset( $exparrvalues[$expkey])?'':'filterhidden'); ?>">
			<input type="checkbox" class="experience-filter filteritem states-filter" value="<?php echo $expkey; ?>" id="lang-filters-29" name="experience[]" <?php if(isset($_REQUEST['experience']) && in_array($expkey,$_REQUEST['experience'])){ ?> checked="checked" <?php } ?> onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute().$urladditional)); ?>')" >
			<span class="flag flag-gb"></span>
			<span><?php echo $exp; ?></span>
			<span class="language-filter-count filter-count-hidden" style="display: inline;">(<?php echo (isset( $exparrvalues[$expkey])?$exparrvalues[$expkey]:'0'); ?>)</span>
			</label><br>
			<?php } ?>
			  
			
          </div>      
 </div>

</li>

<li> 
 <h6 style="background-color:#EBEBEB;padding: 10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a href="#" class="item-title"><strong>Destinations</strong></a></h6>
 <div class="onecolumn">
          <div class="one-fourth" style="padding:9px;"> 
                 <?php foreach( $states as  $state){ ?>		 
			<label class="<?php echo (isset( $statesvalues[$state->id])?'':'filterhidden'); ?>">
			<input type="checkbox" class="language-filters filteritem states-filter" value="<?php echo $state->id; ?>" id="lang-filters-29" name="states[]" <?php if(isset($_REQUEST['states']) && in_array($state->id,$_REQUEST['states'])){ ?> checked="checked" <?php } ?> onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" >
			<span class="flag flag-gb"></span>
			<span><?php echo $state->state_name; ?></span>
			<span class="language-filter-count filter-count-hidden" style="display: inline;">(<?php echo (isset( $statesvalues[$state->id])?$statesvalues[$state->id]:'0'); ?>)</span>
			</label><br>
			<?php } ?>
			  
			
          </div>      
 </div>

</li>


<div style="clear:both;"></div>
<br>

<li>			
       
 <h6 style="background-color:#EBEBEB;padding: 10px;margin-top:-10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a href="#" class="item-title" ><strong>Price</strong></a></h6>
 <div class="onecolumn">
	 
	  <div class="sc-column one-fourth" style="padding: 13px;">
	  
	   <?php foreach(  $amounts as    $amountkey=>$amount){ ?>		 
			<label class="<?php echo (isset( $amountsvalues[$amountkey])?'':'filterhidden'); ?>">
			<input type="checkbox" class="language-filters filteritem amounts-filter" value="<?php echo  $amountkey; ?>" id="lang-filters-29" name="amounts[]" <?php if(isset($_REQUEST['amounts']) && in_array($amountkey,$_REQUEST['amounts'])){ ?> checked="checked" <?php } ?> onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" >
			<span class="flag flag-gb"></span>
			<span><?php echo $amount; ?></span>
			<span class="language-filter-count filter-count-hidden" style="display: inline;">(<?php echo (isset( $amountsvalues[$amountkey])?$amountsvalues[$amountkey]:'0'); ?>)</span>
			</label><br>
			<?php } ?>
	  

</div>
         
         <!-- <div class="one-third" style="padding: 9px;">
		
        <ul class="style1">			 
<li class="style1"><a href="" id="category-link">Private Tour (1)</a></li>
<li class="style1"><a href="" id="category-link">Wheelchair Accessible (2)</a></li>
<li class="style1"><a href="" id="category-link">Skip the Line(4)</a></li>
<li class="style1"><a href="" id="category-link">Hotel Pick-up Possible (3)</a></li>
</ul> 
        
          </div>-->
          
        </div>        

</li>
<br>

<div style="clear:both;"></div>

<li>
 <h6 style="background-color:#EBEBEB;padding: 10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a href="#" class="item-title"><strong>Ratings</strong></a></h6>
 <div class="onecolumn" style="margin-left: 15px;">
	 
	 <div class="sc-column one-fourth" style="">
	
         <label class="">
<span class="flag flag-gb"></span>
 <a href="" id="category-link">
<input type="checkbox" class="language-filters left filteritem " value="29" id="lang-filters-29" style="margin-right:12px;" name="ratings[]"><span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star active last"> </span> <p  id="categories-rating" 
class="rating-space" style="">  (2) </p>
<input type="checkbox" class="language-filters left filteritem" value="29" id="lang-filters-29" style="margin-right:12px;" name="ratings[]"><span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star last"></span><p  id="categories-rating" class="rating-space">(1)</p> 
<input type="checkbox" class="language-filters left filteritem" value="29" id="lang-filters-29" style="margin-right:12px;" name="ratings[]"><span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star"></span> <span class="star last"></span><p  id="categories-rating" class="rating-space">(1)</p> 
<input type="checkbox" class="language-filters left filteritem" value="29" id="lang-filters-29" style="margin-right:12px;" name="ratings[]"><span class="star active"></span> <span class="star active"></span> <span class="star"></span> <span class="star"></span> <span class="star last"></span><p  id="categories-rating" class="rating-space">(0)</p>
<input type="checkbox" class="language-filters left filteritem" value="29" id="lang-filters-29" style="margin-right:12px;" name="ratings[]"><span class="star active"></span> <span class="star"></span> <span class="star"></span> <span class="star"></span> <span class="star last"></span><p  id="categories-rating" class="rating-space">(1)</p>
<!--<input type="checkbox" class="language-filters left" value="29" id="lang-filters-29" style="margin-right:12px;"><span>Not yet rated</span><span  id="categories-rating">(1)</span><br>-->
     
            <!--   <div class="ait-tab tab-content" data-ait-tab-title="Ratings">
               
                <div class="item-stars clearfix"><input type="checkbox" class="language-filters left" value="29" id="lang-filters-29" > &nbsp;<span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star active last"></span> <span>
                  <p> (2) </p>
                  </span> </div>
                <div class="item-stars clearfix"><input type="checkbox" class="language-filters left" value="29" id="lang-filters-29" > <span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star last"></span> <span>
                  <p> (0) </p>
                  </span> </div>
                <div class="item-stars clearfix"><input type="checkbox" class="language-filters left" value="29" id="lang-filters-29" > <span class="star active"></span> <span class="star active"></span> <span class="star active"></span> <span class="star"></span> <span class="star last"></span> <span>
                  <p> (0) </p>
                  </span> </div>
                <div class="item-stars clearfix"> <input type="checkbox" class="language-filters left" value="29" id="lang-filters-29" ><span class="star active"></span> <span class="star active"></span> <span class="star"></span> <span class="star"></span> <span class="star last"></span> <span>
                  <p> (0) </p>
                  </span> </div>
                <div class="item-stars clearfix"> <input type="checkbox" class="language-filters left" value="29" id="lang-filters-29" ><span class="star active"></span> <span class="star"></span> <span class="star"></span> <span class="star"></span> <span class="star last"></span> <span>
                  <p> (0) </p>
                  </span> </div>
                  </div>-->
         
</a>

</label>
</div>

          </div>                       
       
</li>
	<style>
	.item-stars p {
margin-top: -5px;
text-indent: 10px;
color: #C1C1C1;
}
	</style> 

<div style="clear:both;"></div>
<li>
 <h6 style="background-color:#EBEBEB;padding: 10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a href="#" class="item-title"><strong>Languages</strong></a></h6>
 
<div class="onecolumn">
          <div class="sc-column one-fourth" style="padding: 13px;">
		  
		    <?php foreach( $languages as  $language){ ?>		 
			<label class="<?php echo (isset( $languagesvalues[$language->language_id])?'':'filterhidden'); ?>">
			<input type="checkbox" class="language-filters filteritem languages-filter" value="<?php echo $language->language_id; ?>" id="lang-filters-29" name="languages[]" <?php if(isset($_REQUEST['languages']) && in_array($language->language_id,$_REQUEST['languages'])){ ?> checked="checked" <?php } ?> onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" >
			<span class="flag flag-gb"></span>
			<span><?php echo $language->language_name; ?></span>
			<span class="language-filter-count filter-count-hidden" style="display: inline;">(<?php echo (isset( $languagesvalues[$language->language_id])?$languagesvalues[$language->language_id]:'0'); ?>)</span>
			</label><br>
			<?php } ?>
			
            
           

          </div>         
        </div>                
        <br />
</li>

<div style="clear:both;"></div>
<br>
<li>			
       
 <h6 style="background-color:#EBEBEB;padding: 10px;margin-top:-10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a href="#" class="item-title" ><strong>Services</strong></a></h6>
 <div class="onecolumn">
	 
	  <div class="sc-column one-fourth" style="padding: 13px;">
	 
	   <?php foreach( $services as  $service){ ?>		 
			<label class="">
			<input type="checkbox" class="language-filters filteritem services-filter" value="<?php echo $service->service_id; ?>" id="lang-filters-29" name="services[]" <?php if(isset($_REQUEST['services']) && in_array($service->service_id,$_REQUEST['services'])){ ?> checked="checked" <?php } ?> onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" >
			<span class="flag flag-gb"></span>
			<span><?php echo $service->service_name; ?></span>
			<span class="language-filter-count filter-count-hidden" style="display: inline;"></span>
			</label><br>
			<?php } ?>
	 

</div>
         
         <!-- <div class="one-third" style="padding: 9px;">
		
        <ul class="style1">			 
<li class="style1"><a href="" id="category-link">Private Tour (1)</a></li>
<li class="style1"><a href="" id="category-link">Wheelchair Accessible (2)</a></li>
<li class="style1"><a href="" id="category-link">Skip the Line(4)</a></li>
<li class="style1"><a href="" id="category-link">Hotel Pick-up Possible (3)</a></li>
</ul> 
        
          </div>-->
          
        </div>        

</li>

<div style="clear:both;"></div>
<br>
<li>			

       
 <h6 style="background-color:#EBEBEB;padding: 10px;margin-top:-10px;border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-right-radius:0px;
border-bottom-left-radius:0px;"><a class="item-title" href="#"><strong>Working Hours</strong></a></h6>
 <div class="onecolumn">
	 
	  <div style="padding: 13px;" class="sc-column one-fourth">
	   
	       <?php foreach(  $whours as    $whourkey=>$whour){ ?>		 
			<label class="<?php echo (isset( $whoursvalues[$whourkey])?'':'filterhidden'); ?>">
			<input type="checkbox" class="language-filters filteritem whours-filter" value="<?php echo  $whourkey; ?>" id="lang-filters-29" name="whours[]" <?php if(isset($_REQUEST['whours']) && in_array($whourkey,$_REQUEST['whours'])){ ?> checked="checked" <?php } ?> onchange="filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>')" >
			<span class="flag flag-gb"></span>
			<span><?php echo $whour; ?></span>
			<span class="language-filter-count filter-count-hidden" style="display: inline;">(<?php echo (isset( $whoursvalues[$whourkey])?$whoursvalues[$whourkey]:'0'); ?>)</span>
			</label><br>
			<?php } ?>
	  
	  
	      

</div>
         
         <!-- <div class="one-third" style="padding: 9px;">
		
        <ul class="style1">			 
<li class="style1"><a href="" id="category-link">Private Tour (1)</a></li>
<li class="style1"><a href="" id="category-link">Wheelchair Accessible (2)</a></li>
<li class="style1"><a href="" id="category-link">Skip the Line(4)</a></li>
<li class="style1"><a href="" id="category-link">Hotel Pick-up Possible (3)</a></li>
</ul> 
        
          </div>-->
          
        </div>        

</li>



<br>
</ul>

 
     </div> <!--------1st column---->

     
     <div class="sc-column sc-column-last three-fourth-last" id="right-pane">
	 <div class="filtersmanagesection">
	   <?php if(isset($_REQUEST['title']) && trim($_REQUEST['title']) != ''){ ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Title</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('#title');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	   
	   <?php if((isset($_REQUEST['fromdate'])  &&  trim($_REQUEST['fromdate']) != '')|| (isset($_REQUEST['todate'])   &&  trim($_REQUEST['todate']) != '')){ ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Dates</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('#fromdate, #todate');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	    <?php if(isset($_REQUEST['categories']) && trim($_REQUEST['categories']) != ''){ ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Categories</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('.category-filter');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	   
	    <?php if(isset($_REQUEST['experience']) && count($_REQUEST['experience'])){ ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Experience</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('.experience-filter');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	   <?php if(isset($_REQUEST['states']) && count($_REQUEST['states'])){ ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Destinations</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('.states-filter');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	   <?php if(isset($_REQUEST['services']) && count($_REQUEST['services'])){  ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Services</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('.services-filter');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	    <?php if(isset($_REQUEST['whours']) && count($_REQUEST['whours'])){   ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Working Hours</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('.whours-filter');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	   <?php 	if(isset($_REQUEST['amounts']) && count($_REQUEST['amounts'])){    ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Price</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('.amounts-filter');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	    <?php 	if(isset($_REQUEST['languages']) && count($_REQUEST['languages'])){    ?>
	      <div class="filtersmanagesectionpart">
		  <span class="pull-left">Languages</span> <span class="pull-right"><a href="javascript:void(0);" onclick="removesomefilter('.languages-filter');"><img alt="Remove" src="<?php echo Yii::app()->request->baseUrl; ?>/images/remove.png"></a></span>
		  </div>
	   <?php } ?>
	   
	 
	 
	   
	 
	 
	 </div>
	 <ul class="items items-list-view onecolumn">
			<?php
			
			$dataProvider->pagination->pageSize=1;
			 $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'guide_view',
				'template'=>'{items}{pager}',
				'ajaxUpdate'=>true,
				'ajaxUrl'=>array($this->getRoute()),

			)); ?>
		</ul>
	  </div>
</div>
</div>
</div>
<script type="text/javascript">
function filterlist(url){
	$.post(url,  $('.filteritem').serialize()  , function(data){
	$('#maincontent').html(data);
	 documentreadycontent();
														   });
}

function removesomefilter(identify){
 $(identify).val('');
 $(identify).attr('checked',false);
 filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>');
}



 $(function() { 
 
  documentreadycontent();
    
  });
  
  
  function documentreadycontent(){
  
     $('.yiiPager li a').click(function(e){
	    e.preventDefault();
		filterlist('<?php echo CHtml::normalizeUrl(array('/'.$this->getRoute())); ?>/page/'+$(this).html());
	   
	});
	
      $("#fromdate").datepicker({
      showOn: "button",
      buttonImage: "<?php echo Yii::app()->request->baseUrl; ?>/image/calendar.gif",
	  dateFormat: "yy-mm-dd",
      buttonImageOnly: true,
	  onClose: function( selectedDate ) {
		$( "#todate" ).datepicker( "option", "minDate", selectedDate );
		}
    });
    
    $("#todate").datepicker({
      showOn: "button",
      buttonImage: "<?php echo Yii::app()->request->baseUrl; ?>/image/calendar.gif",
	   dateFormat: "yy-mm-dd",
      buttonImageOnly: true,
	   onClose: function( selectedDate ) {
		$( "#fromdate" ).datepicker( "option", "maxDate", selectedDate );
		}
    });
  }
</script>
</div>