@extends('layout.Admin.main_Admin')

@section('content')
<head>
	<title>rcSwitcher</title>
	<meta charset="UTF-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<!--<link type="text/css" rel="stylesheet" href="css/style.min.css">
	<link type="text/css" rel="stylesheet" href="css/rcswitcher.css">-->


	<script>

			window.onload = function(){

				$('.gender :radio').rcSwitcher({
					// reverse: true,
					theme: 'yellowish-green',
					width: 48,
					height: 16,
					onText: '&check;',
					offText: '&cross;',
					blobOffset: 2,
					inputs: true,
					autoStick: true,
				})
				// Listen to status changes
				.on( 'turnon.rcSwitcher', function( e, data ){
					// console.log( data.$input[0].checked );
				} );

				$('.level :radio').rcSwitcher({
					// reverse: true,
					theme: 'flat',
					// width: 70,
					blobOffset: 1,
				});


				$('.permissions :checkbox').rcSwitcher({
					// reverse: true,
					// inputs: true,
					width: 44,
					height: 16,
					blobOffset: 2,
					onText: 'YES',
					offText: 'NO',
					theme: 'dark',
					// autoFontSize: true,
					autoStick: true,
				}).on( 'toggle.rcSwitcher', function( e, data, type ){
					console.log( type );
				} );

				$('.delete :checkbox').rcSwitcher({
					// reverse: true,
					inputs: true,
					// width: 70,
					// height: 24,
					// blobOffset: 2,
					onText: 'Del',
					offText: 'No',
					theme: 'modern',
					// autoFontSize: true,
				}).on({
					'enable.rcSwitcher': function( e, data )
					{
						console.log( 'Enabled', data );
					},

					'disable.rcSwitcher': function( e, data )
					{
						console.log( 'Disabled' );
					}
				});

				/*-------------------------------------------------------------------*\
				|							Testing Input Changes
				\*-------------------------------------------------------------------*/

				// Auto Check Radio Button
				// NOTE: Radio Button Are Disabled Only By Activating Another Sibiling Radio
				$('.toggle-radio').on( 'click', function(e)
				{
					if( $(':radio[value=male]').is(':checked' ) )
						$(':radio[value=male]').prop( 'checked', false )
					else
						$(':radio[value=male]').prop( 'checked', true )

					$(':radio[value=male]').change();
				} );

				// Toggle Disable State Of radio Button
				$('.toggle-radio-disable').on( 'click', function(e)
				{
					if( $(':radio[value=male]').is(':disabled' ) )
						$(':radio[value=male]').prop( 'disabled', false )
					else
						$(':radio[value=male]').prop( 'disabled', true )

					$(':radio[value=male]').change();
				} );

				// Toggle Checked Status For Check Box
				$('.toggle-checkbox').on( 'click', function(e)
				{
					if( $(':checkbox[value=1]').is(':checked' ) )
						$(':checkbox[value=1]').prop( 'checked', false )
					else
						$(':checkbox[value=1]').prop( 'checked', true )

					$(':checkbox[value=1]').change();
				} );


				// Toggle Disabled Status For Check Box
				$('.toggle-checkbox-disable').on( 'click', function(e){

					if( $(':checkbox[value=1]').is(':disabled' ) )
						$(':checkbox[value=1]').prop( 'disabled', false )
					else
						$(':checkbox[value=1]').prop( 'disabled', true )

					$(':checkbox[value=1]').change();
				} );
			};

		</script>
	</head>
	<body>			
		<section class="container clear-fix">			
			<div class="gender block">
				<h4>Select Gender</h4>

				<label for="gender">Male </label><input type="radio" name="gender" value="male"><br />
				<label >Female </label><input type="radio" name="gender" value="female" ><br />
				<label >Select </label><input type="radio" name="gender" value="select" checked >

				<div class="info">
					<ul class="clear-fix">
						<li>Theme<span>light</span></li>
						<li>blobOffset<span>0</span></li>
						<li>autoStick<span>true</span></li>
					</ul>

					<button class="toggle-radio" type="button">select male</button>
					<button class="toggle-radio-disable" type="button">toggle disable male</button>

				</div>


			</div>
			<div class="level block">
				<h4>Level</h4>
	
				<label >level 1 </label><input type="radio" name="level" value="level1" ><br />
				<label >level 2 </label><input type="radio" name="level" value="level2" disabled >
				<label >level 3 </label><input type="radio" name="level" value="level3" checked >

				<div class="info">
					<ul class="clear-fix">
						<li>Theme<span>flat</span></li>
						<li>blobOffset<span>1</span></li>
					</ul>
				</div>
			</div>
			
			<div class="permissions block">
				<h4>Permissions</h4>
			
				<label >Access CP</label><input type="checkbox" name="access_cp" value="access_cp"><br />
				<label >Manage Users </label><input type="checkbox" name="manage_users" value="manage_users" checked >

				<div class="info">
					<ul class="clear-fix">
						<li>width<span>44</span></li>
						<li>height<span>16</span></li>
						<li>Theme<span>dark</span></li>
						<li>blobOffset<span>2</span></li>
						<li>autoStick<span>true</span></li>
						<li>onText<span>YES</span></li>
						<li>offText<span>NO</span></li>
					</ul>
				</div>
			</div>
	
			<div class="delete block">
				<h4>Delete users</h4>
			
				<label >user1 </label><input type="checkbox" name="users_id[]" value="1" checked/><br />
				<label >user2 </label><input type="checkbox" name="users_id[]" value="2"/>

				<div class="info">
					<ul class="clear-fix">
						<li>Theme<span>modern</span></li>
						<li>inputs<span>true</span></li>
						<li>onText<span>Del</span></li>
						<li>offText<span>NO</span></li>
					</ul>
					<button class="toggle-checkbox" type="button">toggle user1</button>
					<button class="toggle-checkbox-disable" type="button">toggle disable user1</button>
				</div>
			</div>
		</section>

		<!-- Foot Scripts -->
		<script type="text/javascript">
			
			// sticky Footer
			var footer = document.getElementById( 'footer' );

			var footerHeight = footer.scrollHeight,
				body = document.getElementsByTagName('body')[0];

			body.style.marginBottom = footerHeight + 'px';

		
		</script>
		
@endsection