@props(['viewModel'])
<div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-3">
        <x-post-header 
        :id='$viewModel["id"]'
        :createTime='$viewModel["createTime"]' 
        :updateTime='$viewModel["updateTime"]' 
        :userAvatar='$viewModel["userAvatar"]' 
        :userName='$viewModel["userName"]'
        :isEditable='$viewModel["isEditable"]'/>
        
        <p class="m-5">{{ $viewModel['content'] }}</p>
        
    </div>
</div>