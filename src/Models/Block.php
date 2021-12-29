<?php

namespace GMJ\LaravelLivewire2Content\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Block extends Model
{

    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['content'];
    protected $table = "laravel_livewire2_contents";

    static public function init($element_id, $sample = null)
    {
        if (!$sample) {
            $sample = "GMJ\LaravelLivewire2Content\Models\Block::sample1";
            $style  = 1;
        } else {
            $style = $sample;
            $sample = "GMJ\LaravelLivewire2Content\Models\Block::sample{$sample}";
        }

        foreach (config('translatable.locales') as $locale) {
            $content[$locale] = $sample();
        }

        $collection = new Block();
        $collection->element_id = $element_id;
        $collection->style = $style;
        $collection->content = $content;
        return $collection;
    }

    static public function sample1()
    {
        return <<<HTML
            <div class="laravel_livewire2_content flex flex-wrap items-center">
                <div class="w-full content">
                    <div class="px-8 pt-6 lg:pt-0 lg:px-5">
                        <div class="main-element-title">Title</div>
                        <div class="main-element-text mt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore eveniet quaerat minima aspernatur aut maiores est porro amet quasi rerum optio repellendus laboriosam nam, cupiditate vel vero quos fugiat, corrupti similique magnam inventore, officia voluptatum sapiente ratione? Veritatis esse explicabo et repellendus veniam itaque magnam distinctio, animi expedita nihil nemo maiores, quis labore? Cum quod ipsam fuga, voluptatum molestiae debitis sequi, temporibus ipsum nisi ullam quas consequatur veniam voluptas sit beatae impedit praesentium, voluptate qui minus vitae eum reprehenderit! Expedita at voluptatibus voluptatum eum saepe quas voluptas nemo inventore doloremque ex, tempore nostrum aut? Eveniet autem minus sapiente. Impedit culpa obcaecati a incidunt ipsa consectetur, rerum distinctio ullam pariatur eligendi modi voluptatum provident nihil! Iure natus quisquam quae, officia libero omnis reprehenderit voluptatum velit dignissimos inventore nemo quas non magni!
                        </div>
                        <div class="mt-4">
                            <a href="#" class="main-btn-bg-color main-btn-text-color rounded-md px-6 py-2 inline-block">More</a>
                        </div>
                    </div>
                </div>
            </div>
HTML;
    }

    static public function sample2()
    {
        return <<<HTML
            <section class="laravel_livewire2_content content_circle_image">    
                <div class="circle circle1">
                    <img src="https://images.unsplash.com/photo-1438109491414-7198515b166b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h600&q=80" alt="" />
                </div>
                <div class="circle circle2">
                    <img src="https://images.unsplash.com/photo-1583864697784-a0efc8379f70?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" alt="" />
                </div>
                <div class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit deleniti minima aperiam! Cumque maxime unde eaque similique expedita sint ullam libero cupiditate, quod reiciendis dolor nemo ab? Eum inventore possimus, earum quidem omnis dolor explicabo sit aut, eius ratione iure ea placeat fugit vel voluptate aperiam velit in adipisci doloribus quam assumenda libero deserunt. Fuga, aut placeat, sapiente maxime delectus ea esse perferendis obcaecati labore explicabo dicta exercitationem quis veritatis magni alias voluptatibus eos sit. Aspernatur est pariatur qui rerum odio accusantium quas velit magni quis hic minus eos voluptatem eligendi quam reiciendis voluptate nostrum, magnam tempora assumenda nemo voluptatum officia nisi nesciunt ut! Perspiciatis enim alias reprehenderit similique non, aut ipsam, voluptates voluptatum aspernatur voluptate odio, perferendis nostrum nam excepturi. Ducimus rerum obcaecati consequatur soluta quibusdam quia dolorem nesciunt eum. Possimus nulla quo quia excepturi saepe eveniet quae, aut explicabo. Quidem autem dignissimos minus, molestias quibusdam ipsam! Eveniet quisquam adipisci, libero sed asperiores sunt? Id sunt illum ipsa numquam ad inventore atque, nesciunt maiores, sed neque quas non a ducimus assumenda, tempora quasi adipisci! Nam voluptate similique quasi soluta laboriosam incidunt quaerat facere dolore veritatis enim. Nulla sequi soluta odio neque dolor amet, non ad quisquam velit, voluptate minus unde. Praesentium sint eum aut iusto reprehenderit quas quibusdam, eaque voluptas aliquid porro. Repudiandae cumque assumenda fugit alias ex officia minus explicabo beatae. Doloribus, itaque consectetur ullam tempore consequatur obcaecati esse. Vitae ut omnis ipsam magni voluptatum, odio voluptates iusto voluptatibus. Ab rerum fuga eligendi assumenda corporis? Facere esse ratione veniam commodi error quos ut dignissimos neque, deserunt excepturi doloribus reiciendis pariatur quae soluta asperiores quas aspernatur minus fuga nulla recusandae dicta itaque sint? Delectus ipsum cupiditate nihil minus nobis maxime eius aliquam, vitae dolorum recusandae in harum laborum, reiciendis tempora incidunt ut dolores vero. Recusandae, officiis iure! Voluptates libero debitis animi aperiam maiores, iusto repellendus eligendi hic eos tenetur optio aliquam incidunt harum unde beatae dignissimos quis nihil molestias mollitia dolorem a? Veniam eos, repellendus adipisci dignissimos ad architecto excepturi magni voluptatem explicabo temporibus tempore dolor sapiente quia sed quidem ab exercitationem, iusto expedita. Quam quisquam, ea sequi consequuntur consectetur aliquam ratione tempore, quis esse illum sit autem laborum. A dolore omnis eaque quo sint debitis aperiam totam repellat rem itaque voluptates officiis adipisci, iusto minus ullam perspiciatis doloribus, fugit vitae ratione dignissimos voluptate ducimus distinctio! Est, error debitis exercitationem, necessitatibus ipsam provident voluptatibus libero hic maxime, iure excepturi?
                </div>
            </section>
HTML;
    }

    static public function sample3()
    {
        return <<<HTML
            <div class="laravel_livewire2_content content_two_column flex flex-wrap items-center -mx-8">
                <div class="w-full lg:w-6/12 content_left">
                    <div class="px-8 lg:px-5 h-full w-full">
                        <div class="overflow-hidden image-wrapper">
                            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1121&q=80" alt="" class="transform hover:scale-125 duration-500">
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-6/12 content_right">
                    <div class="px-8 pt-6 lg:pt-0 lg:px-5">
                        <div class="main-element-title">Title</div>
                        <div class="main-element-text mt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore eveniet quaerat minima aspernatur aut maiores est porro amet quasi rerum optio repellendus laboriosam nam, cupiditate vel vero quos fugiat, corrupti similique magnam inventore, officia voluptatum sapiente ratione? Veritatis esse explicabo et repellendus veniam itaque magnam distinctio, animi expedita nihil nemo maiores, quis labore? Cum quod ipsam fuga, voluptatum molestiae debitis sequi, temporibus ipsum nisi ullam quas consequatur veniam voluptas sit beatae impedit praesentium, voluptate qui minus vitae eum reprehenderit! Expedita at voluptatibus voluptatum eum saepe quas voluptas nemo inventore doloremque ex, tempore nostrum aut? Eveniet autem minus sapiente. Impedit culpa obcaecati a incidunt ipsa consectetur, rerum distinctio ullam pariatur eligendi modi voluptatum provident nihil! Iure natus quisquam quae, officia libero omnis reprehenderit voluptatum velit dignissimos inventore nemo quas non magni!
                        </div>
                        <div class="mt-2 text-right">
                            <a href="#" class="main-btn-bg-color main-btn-text-color rounded-md px-6 py-2 inline-block">More</a>
                        </div>
                    </div>
                </div>
            </div>
HTML;
    }

    static public function sample4()
    {
        return <<<HTML
            <div class="laravel_livewire2_content content_two_column flex flex-wrap items-center -mx-8">
                <div class="w-full lg:w-6/12">
                    <div class="px-8 pt-6 lg:pt-0 lg:px-5">
                        <div class="main-element-title">Title</div>
                        <div class="main-element-text mt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore eveniet quaerat minima aspernatur aut maiores est porro amet quasi rerum optio repellendus laboriosam nam, cupiditate vel vero quos fugiat, corrupti similique magnam inventore, officia voluptatum sapiente ratione? Veritatis esse explicabo et repellendus veniam itaque magnam distinctio, animi expedita nihil nemo maiores, quis labore? Cum quod ipsam fuga, voluptatum molestiae debitis sequi, temporibus ipsum nisi ullam quas consequatur veniam voluptas sit beatae impedit praesentium, voluptate qui minus vitae eum reprehenderit! Expedita at voluptatibus voluptatum eum saepe quas voluptas nemo inventore doloremque ex, tempore nostrum aut? Eveniet autem minus sapiente. Impedit culpa obcaecati a incidunt ipsa consectetur, rerum distinctio ullam pariatur eligendi modi voluptatum provident nihil! Iure natus quisquam quae, officia libero omnis reprehenderit voluptatum velit dignissimos inventore nemo quas non magni!
                        </div>
                        <div class="mt-2 text-right">
                            <a href="#" class="main-btn-bg-color main-btn-text-color rounded-md px-6 py-2 inline-block">More</a>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-6/12">
                    <div class="px-8 lg:px-5 h-full w-full">
                        <div class="overflow-hidden image-wrapper">
                            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1121&q=80" alt="" class="transform hover:scale-125 duration-500">
                        </div>
                    </div>
                </div>
            </div>
HTML;
    }
    static public function sample5()
    {
        return <<<HTML
            <div class="leavel_livewire2_content relative h-screen w-full bg-black">
                <div class="text-white text-3xl text-center">TITLE</div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" style="width:600px;height:150px">
                    <div class="absolute transform duration-500 rotate-45 overflow-hidden top-0 opacity-60 hover:opacity-100 cursor-default" style="width:200px;height:200px;margin:-100px">
                        <img src="https://images.unsplash.com/photo-1604004555489-723a93d6ce74?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" class="absolute transform scale-150 -rotate-45" alt="">
                    </div>
                    <div class="absolute transform duration-500 rotate-45 overflow-hidden bottom-0 left-1/4 opacity-60 hover:opacity-100 cursor-default" style="width:200px;height:200px;margin:-100px">
                        <img src="https://images.unsplash.com/photo-1554126807-6b10f6f6692a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" class="absolute transform scale-150 -rotate-45" alt="">
                    </div>
                    <div class="absolute transform duration-500 rotate-45 overflow-hidden top-0 left-2/4   opacity-60 hover:opacity-100 cursor-default" style="width:200px;height:200px;margin:-100px">
                        <img src="https://images.unsplash.com/photo-1582610285985-a42d9193f2fd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" class="absolute transform scale-150 -rotate-45" alt="">
                    </div>
                    <div class="absolute transform duration-500 rotate-45 overflow-hidden bottom-0 left-3/4 opacity-60 hover:opacity-100 cursor-default" style="width:200px;height:200px;margin:-100px">
                        <img src="https://images.unsplash.com/photo-1578774296842-c45e472b3028?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" class="absolute transform scale-150 -rotate-45" alt="">
                    </div>
                    <div class="absolute transform duration-500 rotate-45 overflow-hidden top-0 left-full  opacity-60 hover:opacity-100 cursor-default" style="width:200px;height:200px;margin:-100px">
                        <img src="https://images.unsplash.com/photo-1508341591423-4347099e1f19?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" class="absolute transform scale-150 -rotate-45" alt="">
                    </div>
                </div>
            </div>
HTML;
    }
}
