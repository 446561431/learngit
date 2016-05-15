<strong>Basic Table</strong>
									
									<table class="table responsive">

										<thead>
											<tr>
												<th><input type="checkbox" name="" id="checkall"></th>
												<th>ID</th>
												<th>地区名称</th>
												<th>操作</th>
											</tr>
										</thead>
								
								@foreach($area as $v)
										<tbody>
											<tr>
												<td><input type="checkbox" name="checkname" id="" value="{{ $v -> area_id  }}"></td>
												<td>{{ $v -> area_id  }}</td>
												<td>{{ $v -> area_name  }}</td>
												<td><a href="/up_area?area_id={{ $v -> area_id  }}" class="up" value="{{ $v -> area_id  }}">修改</a>|<a href="JavaScript:void(0)" value="{{ $v -> area_id  }}" class="del">删除</a></td>
											</tr>
										</tbody>
								@endforeach	
								
									</table>
									{!! $area->links() !!}