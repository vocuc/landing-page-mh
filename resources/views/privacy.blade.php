@extends('layouts.app-2')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form3.css') }}">	
    <style>
        .policy {
            color: #ffffff;
        }
        .policy h1, .policy h2, .policy p, .policy ul, .policy li {
            color: #ffffff;
        }
        .content {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
@endpush
@section('title', 'Chính Sách Bảo Mật')
@section('content')
    <section class="policy mw-1220 m-auto">
        <div class="content w-963 m-auto">
            <h1>Chính Sách Bảo Mật</h1>
            <div class="value">
                <p>Chào mừng bạn đến với trang Chính Sách Bảo Mật của chúng tôi! Quyền riêng tư của bạn là điều cực kỳ quan trọng đối với chúng tôi.</p>

                <h2>Thông Tin Chúng Tôi Thu Thập</h2>
                <p>Chúng tôi thu thập thông tin để cung cấp dịch vụ tốt hơn cho tất cả người dùng của mình. Các thông tin này bao gồm:</p>
                <ul>
                    <li>Thông tin bạn cung cấp cho chúng tôi</li>
                    <li>Thông tin chúng tôi thu thập từ việc bạn sử dụng dịch vụ</li>
                </ul>

                <h2>Cách Chúng Tôi Sử Dụng Thông Tin</h2>
                <p>Chúng tôi sử dụng thông tin thu thập được để cải thiện dịch vụ và đảm bảo sự hài lòng của bạn.</p>

                <h2>Chia Sẻ Thông Tin Của Bạn</h2>
                <p>Chúng tôi không chia sẻ thông tin cá nhân với các công ty, tổ chức hoặc cá nhân bên ngoài, trừ khi thuộc một trong các trường hợp sau:</p>
                <ul>
                    <li>Khi có sự đồng ý của bạn</li>
                    <li>Vì mục đích xử lý bên ngoài</li>
                    <li>Vì lý do pháp lý</li>
                </ul>

                <h2>Bảo Mật Dữ Liệu</h2>
                <p>Chúng tôi nỗ lực bảo vệ người dùng khỏi việc truy cập, thay đổi, tiết lộ hoặc phá hủy thông tin trái phép.</p>

                <h2>Thay Đổi Chính Sách</h2>
                <p>Chính sách bảo mật của chúng tôi có thể thay đổi theo thời gian. Chúng tôi sẽ không giảm quyền của bạn theo Chính Sách Bảo Mật này mà không có sự đồng ý rõ ràng của bạn.</p>

                <h2>Liên Hệ</h2>
                <p>Nếu bạn có bất kỳ câu hỏi nào về Chính Sách Bảo Mật, vui lòng liên hệ với chúng tôi qua email</p>
				<h2>Thông Tin Quan Trọng</h2>
                <p>* Tất cả giá đều bằng VND</p>
                <p>** <strong>QUAN TRỌNG:</strong> Sản phẩm này và toàn bộ các quà tặng KHÔNG đi kèm bất kỳ Quyền bán lại, Quyền sử dụng làm nhãn hiệu riêng hoặc Quyền sử dụng làm quà tặng. Các mẫu này được thiết kế để giúp bạn bán sản phẩm và dịch vụ của riêng mình và bạn không thể bán, chia sẻ hoặc tặng các mẫu của chúng tôi cũng như không sử dụng tài liệu marketing của chúng tôi trong bất kỳ trường hợp nào. Chúng tôi – Thiên Nhai – có quyền theo đuổi hành động pháp lý để bồi thường thiệt hại.</p>
                <p><strong>KHÔNG phải FACEBOOK:</strong> Trang web này không phải là một phần của trang web Facebook™ hoặc Facebook Inc. Ngoài ra, trang web này KHÔNG được Facebook™ chứng thực dưới bất kỳ hình thức nào. FACEBOOK là thương hiệu của FACEBOOK, Inc.</p>
                <p><strong>TUYÊN BỐ TỪ CHỐI TRÁCH NHIỆM:</strong> Xin vui lòng hiểu rằng kết quả phụ thuộc vào bản thân người dùng. Kết quả của bạn sẽ khác nhau và phụ thuộc vào nhiều yếu tố bao gồm nhưng không giới hạn ở nền tảng, kinh nghiệm và đạo đức làm việc của bạn. Tất cả hoạt động kinh doanh đều tiềm ẩn rủi ro cũng như phải có những nỗ lực và hành động thường xuyên và nhất quán mới có thể đem đến kết quả.</p>
            
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/detail.js') }}"></script>
@endpush
