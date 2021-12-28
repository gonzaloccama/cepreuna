<div class="col-md-12 py-115">
    <!-- Begin Project Area -->
    <div class="project-area">
        @php
            $statements = \App\Models\Statement::orderBy('created_at', 'desc')->where('category_statement', 1)->paginate($statementLoadMore);
        @endphp
        @include('livewire.home-component.content-user.index')
    </div>
    <!-- Project Area ENd Here -->

    <!-- Begin Project Area -->
    <div class="project-area pt-10">
        @php
            $documents = \App\Models\Document::orderBy('name_document', 'asc')->where('category_document', 1)->paginate($documentLoadMore);
        @endphp
        @include('livewire.home-component.content-user.documents')
    </div>
    <!-- Project Area ENd Here -->
</div>
