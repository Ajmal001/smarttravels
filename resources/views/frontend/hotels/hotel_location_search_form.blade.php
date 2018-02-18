						<!--PART 7 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Search by Location </h4>
							<div class="hot-page2-alp-l-com1 hot-room-ava-check">
								{!! Form::open(['url' => 'hotellocation']) !!}
									<ul>
										<li>
											<label>Enter Your Location Name</label>
											<input type="text" name="s_location" id="select-location" class="autocomplete" placeholder="Select Location" required> 
										</li>
										
										<li>
											<input type="submit" value="SEARCH"> 
										</li>										
									</ul>
								{!! Form::close() !!}
							</div>
						</div>