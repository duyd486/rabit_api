<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'=>'Sổ tay scrapbook A5 dot 130gsm The Reverie Diary - Thỏ Nơ',
                'price'=>100000,
                'detail'=>'Sổ được thiết kế xen kẽ các trang hoạ tiết nền',
                'category_id'=>'6',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở chấm dot 120 trang Crabit x SGT - The Furry Friends - Xanh tím',
                'price'=>18000,
                'detail'=>'Vở ghi chép 120 trang (chấm dot, grid, kẻ ngang)',
                'category_id'=>'6',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Set Mini Post Card A Few Notes',
                'price'=>9000,
                'detail'=>'Set gồm 6 mẫu post card decor, trang trí sổ tay bàn học',
                'category_id'=>'1',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Box làm đất sét tự khô - Be Happier Clay Craft Box - Box dành cho 1 người (500g)',
                'price'=>189000,
                'detail'=>'Đúng như tên gọi của set này, đây là một chiếc hộp chứa đựng không chỉ niềm vui khi bạn tự tay nhào nặn ra những thành quả mà còn là chiếc hộp chứa đựng đầy đủ các dụng cụ cần thiết để bạn thỏa sức sáng tạo với đất sét tự khô',
                'category_id'=>'1',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ tay A5 kẻ ngang 130gsm 110 trang A Few Notes - We Should Grab A Matcha',
                'price'=>60000,
                'detail'=>'Màu sắc có thể khác biệt hơn thực tế do ánh sáng lúc chụp hoặc ánh sáng hiển thị trên màn hình.',
                'category_id'=>'5',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ tay bỏ túi Dot The Furry Friends Crabit x SGT - Cu Lỳ',
                'price'=>60000,
                'detail'=>'Sổ tay bỏ túi nhỏ gọn kích thước: 130 x 190 mm',
                'category_id'=>'6',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ trơn khổ vuông Ribbon Collection Quote Trắng (Tặng kèm nơ)',
                'price'=>80000,
                'detail'=>'Ribbon Notebook Collection - Bộ sưu tập sổ vở đến từ Crabit. Là cái chạm nhẹ của sự lãng mạnh và nữ tính cho những ghi chép hàng ngày của bạn.',
                'category_id'=>'7',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ tay scrapbook A5 grid 130gsm The Reverie Diary - Nhũ Sọc Xanh',
                'price'=>90000,
                'detail'=>'Tiếp nối cảm hứng từ BST Ribbon 1, bộ sưu tập lần này vẫn mang sự điệu đà, nữ tính của phong cách lãng mạn Toile de jouy, Cottagecore đầy thanh lịch và quý tộc',
                'category_id'=>'8',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
