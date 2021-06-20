@extends('main')

@section('title', ' Notifications')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Notifications</h3>
                        <h4 class="kt-subheader__desc">Liste des notifications</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
					</div>
				</div>
                <!-- end:: Subheader -->
                <div class="kt-portlet__body">
                    <div class="kt-portlet kt-portlet--mobile">
                         <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon2-card"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Liste des notifications
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet">

                            <table class="kt-datatable">
                                <thead>
                                    <tr>
                                        <th title="Field #1">Titre</th>
										<th title="Field #2">Message</th>
										
                                        <th title="Field #6">Actions</th>
                                        <th title="Field #6"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->unreadNotifications as $notification)
                                    <tr>
                                        <td>{{$notification->data['titre']}}</td>
                                        <td>{{$notification->data['message']}}</td>
                                        
                                        <td>
                                            <form action="{{ route('notification.update', $notification->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="submit" class="btn btn-success btn-sm" value="@lang('Marquer comme lu')">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Portlet-->
                        </div>
                    </div> 
                </div>
				<!-- end:: Content -->
			</div>
		</div>
    </div>
@endsection