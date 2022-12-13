<!-- Author: Kamal Patel, 000863596 
This file is taken from module section and is updated by me.
-->
<?PHP
include_once "file_storage.php";
$filename = 'data.json';
$data = array  ("gpu1"=>array("product_id"=>"GXAui50","product_name"=>"ASUS Dual NVIDEA Geforce RTX 3050 OC 8GB GDDR6 Video Card","product_category"=>"Graphic_Card",
                                   "product_description"=>"8GB GDDR6 graphics card with a maximum resolution support of 7680 x 4320 ensures superior visual clarity. 1822MHz core clock speed makes the GPU keep up with the fast paced gaming actions without lags. OpenGL4.6 support to increase the rendering speed resulting in rich graphics and fluid motions. ","product_price"=>499.99,"product_quantity"=>20),

                "gpu2"=>array("product_id"=>"GXNui60i","product_name"=>"NVIDIA GeForce RTX 3060 Ti 8GB GDDR6 Video Card","product_category"=>"Graphic_Card",
                                   "product_description"=>"8GB of high-speed GDDR6 video memory is powerful enough to render graphics-rich games with a maximum resolution of 7680 x 4320 to keep you totally immersed in your gameplay. 1.41MHz core clock speed and 1,665MHz boost clock speed keep up with the most intense, demanding gaming action. Powered by Ampere-NVIDIA's 2nd-generation RTX architecture with advanced streaming processors to deliver incredible performance while editing videos and playing games.","product_price"=>549.99,"product_quantity"=>0),

                "gpu3"=>array("product_id"=>"GXAui70i","product_name"=>"ASUS ROG Strix NVIDIA GeForce RTX 3070 Ti OC 8GB GDDR6X Video Card","product_category"=>"Graphic_Card",
                                   "product_description"=>"8GB of GDDR6X graphics card memory deliver a max resolution of 7680 x 4320. 1875 MHz (Boost Clock) speed in OC mode and 1845 MHz (Boost Clock) speed in gaming mode can handle your most demanding game. PCI Express 4.0 allows quick and easy installation","product_price"=>999.98,"product_quantity"=>45),

                "gpu4"=>array("product_id"=>"GXNui80i","product_name"=>"NVIDIA GeForce RTX 3080 Ti 12GB GDDR6X Video Card","product_category"=>"Graphic_Card",
                                   "product_description"=>"1800MHz core clock speed with 7680x4320 maximum resolution meets the demands of your games to boost your visuals. NVIDIA GeForce RTX 3080 Ti is powered by NVIDIA Ampere architecture and built with 2nd gen RT cores and 3rd gen tensor cores to upgrade your gaming experience. Microsoft DirectX 12 Ultimate, Vulkan RT API, and OpenGL 4.6 API support improve textures, lighting effects and details to boost your gaming experience. VR ready design means you can create an immersive gaming experience with compatible VR accessories.","product_price"=>1149.98,"product_quantity"=>67),
                
                "gpu5"=>array("product_id"=>"GXNun90i","product_name"=>"NVIDIA GeForce RTX 4090 24GB GDDR6 Video Card","product_category"=>"Graphic_Card",
                                   "product_description"=>"24GB of high-speed GDDR6X video memory delivers ray tracing and AI-powered graphics for an immersive gaming experience. 2235MHz core clock speed and 2.52GHz boost clock speed provide the power you need to keep up with the most intensive games. NVIDIA Ada Lovelace architecture with 16,384 NVIDIA CUDA cores, dedicated ray tracing cores, and dedicated tensor cores ensure stunning visuals. PCI Express 4.0 interface is backward-compatible with PCI Express 3.0 for quick and easy installation. ","product_price"=>2099.99,"product_quantity"=>30),
                                   
                "processor1"=>array("product_id"=>"PXIui560","product_name"=>"Intel Core i5-12400 6-Core 2.5GHz LGA1700 Processor","product_category"=>"Processor",
                                   "product_description"=>"Six cores, 12 threads, and support for PCIe Gen 5.0/4.0 (20 lanes total) and DDR5/DDR4 make the processor ideal for gaming and other intensive tasks. 2.5GHz processor speed and 4.4GHz Max Boost clock speed enable rapid communication between the CPU and other PC components for quick performance. 65-watt base power is compatible with 600-series chipset-based motherboards. ","product_price"=>254.99,"product_quantity"=>50),
                                   
                "processor2"=>array("product_id"=>"PXAur56G","product_name"=>"AMD Ryzen 5 5600G 6-Core 3.9GHz AM4 Processor","product_category"=>"Processor",
                                   "product_description"=>"3.9 GHz Hexacore, 12-thread processor with 4.4 GHz maximum boost clock speed delivers incredible computing performance and long CPU life. Experience smooth and fast computing performance like never before with the AMD Ryzen 5 5600G processor. The 6-core processor is designed with an AM4 socket and a PCI3 3.0 slot for a wide range of compatibility and increased communication speeds. The automatic Precision Boost 2 levels up processor frequencies for the ultimate performance.","product_price"=>189.99,"product_quantity"=>0),
                                   
                "processor3"=>array("product_id"=>"PXIui78K","product_name"=>"Intel Core i7-12700K Octa-Core 3.6GHz Processor","product_category"=>"Processor",
                                   "product_description"=>"Eight cores and 20 threads efficiently handle gaming, video editing, and other heavy programs. 3.6GHz processor speed and 5GHz Max Boost clock speed ensure rapid communication between the CPU and other components of your PC to get the work done fast. Turbo Boost Max Technology 3.0 significantly boost the clock speed automatically when working with heavy workloads. Works with 600 series chipset based motherboards.", "product_price"=>499.99,"product_quantity"=>40),
                                   
                "processor4"=>array("product_id"=>"PXIui98F","product_name"=>"Intel Core i9-12900KF Octa-Core 3.2GHz Processor","product_category"=>"Processor",
                                   "product_description"=>"Eight cores and 24 threads efficiently handle gaming, video editing and other heavy programs. 3.2GHz processor speed and 5.2GHz Max Boost clock speed ensure rapid communication between the CPU and other components of your PC to get your work done fast. Unlocked processor can be overclocked easily and quickly. Turbo Boost Max Technology 3.0 significantly boosts the clock speed automatically when working with heavy workloads. Works with 600 series chipset based motherboards.","product_price"=>719.95,"product_quantity"=>13),
                                   
                "processor5"=>array("product_id"=>"PXAur78X","product_name"=>"AMD Ryzen 7 5800X Octa-Core 3.8GHz AM4 Desktop Processor","product_category"=>"Processor",
                                   "product_description"=>"3.8GHz clock speed can run resource-intensive applications without slowing down. Eight cores adeptly handle high-FPS gaming sessions, video editing, and many more heavy-duty programs. 3200Mhz bus speed ensures rapid communication between the CPU and other components of your PC. 32MB of L3 cache and 4MB of L2 cache available to keep up with extensive multi-tasking demands.VR-ready design lets you use virtual reality headsets and accessories (sold separately) to immerse yourself in cyberspace","product_price"=>369.99,"product_quantity"=>55),
                                   
                "processor6"=>array("product_id"=>"PXAur56X","product_name"=>"AMD Ryzen 5 7600X 6-Core 4.7GHz AM5 Processor","product_category"=>"Processor",
                                   "product_description"=>"4.7GHz AM5 CPU with 5.3GHz max boost clock is built to deliver the power needed to handle heavy workload. Six cores, 12 threads, and boost clocks of up to 5.3GHz deliver powerful peformance like never before. VR ready CPU lets you enjoy the immersive gaming experience offered by virtual reality games. Elevate your experience with time-saving connectivity like PCIe 5.0 storage support, ultra-fast Wi-Fi 6E, AMD EXPO technology, and dedicated video accelerators.","product_price"=>409.99,"product_quantity"=>15),
                                   
                "processor7"=>array("product_id"=>"PXIui916","product_name"=>"Intel Core i9-12900KS 16-Core 2.5GHz Processor","product_category"=>"Processor",
                                   "product_description"=>"2.5GHz clock speed with a whopping 5.5GHz max boost offers unrivalled performance. 16 cores and 24 threads let you run multiple heavy duty tasks with zero lag or any compromise in performance. Integrated memory controller with 14MB L2 cache and 30MB L3 cache means reduced latencies and faster data retrieval for delivering ultra-high performance. Hyper-threading technology gives you exemplary multi-threaded performance which makes game play smoother, video rendering faster, and more. ","product_price"=>969.99,"product_quantity"=>39),
                                  
                "processor8"=>array("product_id"=>"PXAur916","product_name"=>"AMD Ryzen 9 7950X 16-Core 4.5GHz AM5 Processor","product_category"=>"Processor",
                                   "product_description"=>"4.5GHz AM5 CPU with 5.7GHz max boost clock is built to deliver the power needed to handle heavy workload. 16 cores, 32 threads, and boost clocks of up to 5.7GHz deliver powerful peformance like never before. VR ready CPU lets you enjoy the immersive gaming experience offered by virtual reality games. Elevate your experience with time-saving connectivity like PCIe 5.0 storage support, ultra-fast Wi-Fi 6E, AMD EXPO technology, and dedicated video accelerators.","product_price"=>949.99,"product_quantity"=>23),
                                  
                "accesory1"=>array("product_id"=>"AXHua60O","product_name"=>"HyperX Alloy Origins 60 Backlit Mechanical Red-Linear Gaming Keyboard - English","product_category"=>"Accessory",
                                   "product_description"=>"Wired keyboard comes with a 1.8m-long, detachable USB-C cable and adjustable keyboard angles for all around practicality. Compact keyboard with a 60% form factor features a QWERTY layout and a numeric keypad. HyperX Red linear mechanical switches are highly reliable and can withstand up to 80 million key presses. 100% anti-ghosting and N-key rollover feature let you press multiple keys at a time. HyperX NGENUITY software allows you to customise your keyboard with RGB lighting effects, macros, and more.","product_price"=>79.99,"product_quantity"=>20),
                                 
                "accessory2"=>array("product_id"=>"AXHua07S","product_name"=>"HyperX Cloud Alpha S Gaming Headset - Black/ Blue","product_category"=>"Accessory",
                                   "product_description"=>"Over-ear headphones feature memory foam ear cushions with breathable leatherette covers for long-wearing comfort while you play. Custom-tuned HyperX 7.1 surround sound, 50mm HyperX dual-chamber drivers, and neodymium magnets deliver rich, immersive audio. Bass adjustment sliders on the ear cups allow you to fine-tune the bass level for customized sound. Active noise canceling helps to block out unwanted sounds so you don't miss a thing in the game. Detachable noise cancellation mic allows you to enjoy clear conversation with your friends as you play.","product_price"=>139.99,"product_quantity"=>0),
                                  
                "accessory3"=>array("product_id"=>"AXLug304","product_name"=>"Logitech G304 Gaming Mouse (White) - Brand New","product_category"=>"Accessory",
                                   "product_description"=>"HERO is a revolutionary new optical sensor designed by Logitech G to deliver class-leading performance and up to 10 times the power efficiency (compared to previous gen). HERO sensor delivers exceptionally accurate and consistent performance with zero smoothing, filtering or acceleration from 200 to 12,000 DPI. G304 can save up to 5 profiles with up to 5 DPI levels each on the onboard memory. G304 primary switches, both left and right, are rated for 10 million clicks. G304 also has middle click, DPI button and two side buttons that can be programmed to your preferences using Logitech Gaming Software (LGS).","product_price"=>99.34,"product_quantity"=>25),
                                  
                "accessory4"=>array("product_id"=>"AXCuc65K","product_name"=>"Corsair K65 Mini Backlit Mechanical Cherry MX  Keyboard - White - English","product_category"=>"Accessory",
                                   "product_description"=>"Wired mechanical gaming keyboard with 1.82m cord enables fast input and low latency. Compact size makes this keyboard easily fit into tight spaces without compromising your gaming performance. Cherry MX Speed mechanical switches with 1.2mm actuation distance lend quick response times. 8,000Hz hyper-polling by Corsair Axon hyper-processing technology transmits your input 8 times faster than regular gaming keyboards. 100% anti-ghosting with complete N-Key Rollover (NKRO) registers every keypress regardless of how fast the keys are pressed.","product_price"=>199.99,"product_quantity"=>0),
                                  
                "accessory5"=>array("product_id"=>"AXCuvRGB","product_name"=>"Corsair Void RGB Elite Wireless Gaming Headset with Microphone - Black","product_category"=>"Accessory",
                                   "product_description"=>"Over-ear headphones feature breathable microfibre mesh fabric and memory foam earpads to keep you comfortable during long gaming sessions. Low-latency 2.4GHz wireless connection gives you complete freedom of movement with a 40-foot range. Included USB cable lets you connec to your PC or PlayStation 4. 50mm drivers and neodymium magnets deliver 7.1 surround sound  to your PC and high-fidelity, ultra-low latency audio with a frequency range of 20Hz-40,000Hz on every device. Optimized omni-directional microphone picks up your voice with exceptional clarity and features a flip-up mute function and LED mute indicator.","product_price"=>99.99,"product_quantity"=>16),
                                  
                "accessory6"=>array("product_id"=>"AXLugPRO","product_name"=>"Logitech G Pro X Superlight 25600 DPI Wireless Mouse - White","product_category"=>"Accessory",
                                   "product_description"=>"Ambidextrous wireless gaming mouse is perfect for left-handers and right-handers alike. Designed in collaboration with some of the world's top esports professionals for hardcore gamers who require the ultimate in precision. LIGHTSPEED wireless connectivity provides the dependable, millisecond-fast performance required for a lag-free experience at a range of up to 1.8 metres. HERO sensor gives precise, fast, and consistent control across the entire 16,000 dpi range, and can be updated to 25,600 max DPI via firmware update. Large zero-additive PTFE feet glide smoothly for a fluid connection.","product_price"=>199.99,"product_quantity"=>5));
writeDataFile($filename,$data);
if ( file_exists($filename) ){ }
else { print "Data file not created!";}
?>