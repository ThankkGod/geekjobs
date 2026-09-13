 <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        @foreach (\App\Models\General::latest()->take(1)->get() as $applicationGeneral )
                        
                        
                        <div class="col-md-6">
                            <div> © {{ $applicationGeneral->name }}Geek Jobs {{ date('Y') }} </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Designed & Developed By {{ $applicationGeneral->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </footer>