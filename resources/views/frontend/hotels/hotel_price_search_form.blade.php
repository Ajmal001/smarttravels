						<!--PART 5 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-dollar" aria-hidden="true"></i> Select Price</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
								{!! Form::open(['url' => 'hotelprice','method'=>'post']) !!}
									<ul>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp51" class="styled" name="sf_price" value="5000"  type="checkbox">
												<label for="chp51"> 5000 TK + </label>
											</div>
										</li>
										
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp52" class="styled" name="s_price" value="4000" type="checkbox">
												<label for="chp52"> 4000 TK - 5000 Tk </label>
											</div>
										</li>
										
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp53" class="styled" name="s_price" value="3000" type="checkbox">
												<label for="chp53"> 3000 TK - 4000 Tk </label>
											</div>
										</li>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp54" class="styled" name="s_price" value="2000" type="checkbox">
												<label for="chp54"> 2000 TK - 3000 Tk </label>
											</div>
										</li>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp55" class="styled" name="s_price" value="1000" type="checkbox">
												<label for="chp55"> 1000 TK - 2000 Tk  </label>
											</div>
										</li>										
										
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp56" class="styled" name="s_price" value="0" type="checkbox">
												<label for="chp56"> 100 Tk - 1000 Tk   </label>
											</div>
										</li>
										<div>
											<input type="submit" class="hot-page2-alp-quot-btn" value="SEARCH">
										</div>	
									</ul>
								{!! Form::close() !!}
							</div>
						</div>
						<!--END PART 5 : LEFT LISTINGS-->