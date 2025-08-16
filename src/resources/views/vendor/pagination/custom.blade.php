<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <style>
        ul.pagination {
            list-style: none;
            display: flex;
            box-sizing: border-box;
            border: solid #E0DFDE 1px;
            border-radius: 5px;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            margin: 0;
            padding: 0;
            font-family: "Inika", serif;
            font-weight: 400;
        }

        li.page-item {
            margin: 0;
            border-right: solid #E0DFDE 1px;
            padding: 0 2px;
            width: 32px;
            text-align: center;
            box-sizing: border-box;
            font-size: 18px;
        }

        li.page-item--first {
            margin: 0;
            border-right: solid #E0DFDE 1px;
            padding: 0 2px;
            width: 32px;
            text-align: center;
            box-sizing: border-box;
            font-size: 18px;
        }

        li.page-item--last {
            margin: 0;
            padding: 0 2px;
            width: 32px;
            text-align: center;
            box-sizing: border-box;
            font-size: 18px;
        }

        a.page-link  {
            text-decoration: none;
            color: #8B7969;
            width: 32px;
            display: inline-block;
            text-align: center;
            padding-right: 6px;
        }
            
        ul.pagination li.active span {
            background-color: #8B7969; /* 選択中のページの色 */
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: inline-block;
            width: 33px;
            box-sizing: border-box;
            font-size: 18px;
            transform: translateX(-2.6px);
        }

    </style>
</head>

@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
            <!-- 前のページへのリンク -->
            <li class="page-item--first {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
                <a class="page-link page-link--prev" href="{{ $paginator->appends(request()->query())->previousPageUrl() }}">&lsaquo;</a>
            </li>

        {{-- Pagination Elemnts --}}
            {{-- Array Of Links --}}
            {{-- 定数よりもページ数が多い時 --}}
            @if ($paginator->lastPage() > config('const.PAGINATE.LINK_NUM'))

                {{-- 現在ページが表示するリンクの中心位置よりも左の時 --}}
                @if ($paginator->currentPage() <= floor(config('const.PAGINATE.LINK_NUM') / 2))
                    <?php $start_page = 1; //最初のページ ?> 
                    <?php $end_page = config('const.PAGINATE.LINK_NUM'); ?>
        
                {{-- 現在ページが表示するリンクの中心位置よりも右の時 --}}
                @elseif ($paginator->currentPage() > $paginator->lastPage() - floor(config('const.PAGINATE.LINK_NUM') / 2))
                    <?php $start_page = $paginator->lastPage() - (config('const.PAGINATE.LINK_NUM') - 1); ?>
                    <?php $end_page = $paginator->lastPage(); ?>

                {{-- 現在ページが表示するリンクの中心位置の時 --}}
                @else
                    <?php $start_page = $paginator->currentPage() - (floor((config('const.PAGINATE.LINK_NUM') % 2 == 0 ? config('const.PAGINATE.LINK_NUM') - 1 : config('const.PAGINATE.LINK_NUM'))  / 2)); ?>
                    <?php $end_page = $paginator->currentPage() + floor(config('const.PAGINATE.LINK_NUM') / 2); ?>
                @endif

            {{-- 定数よりもページ数が少ない時 --}}
            @else
                <?php $start_page = 1; ?>
                <?php $end_page = $paginator->lastPage(); ?>
            @endif

            {{-- 処理部分 --}}
            @for ($i = $start_page; $i <= $end_page; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->appends(request()->query())->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

        {{-- Next Page Link --}}
            <!-- 次のページへのリンク -->
            <li class="page-item--last {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
                <a class="page-link page-link--next" href="{{ $paginator->appends(request()->query())->nextPageUrl() }}">&rsaquo;</a>
            </li>
    </ul>
@endif