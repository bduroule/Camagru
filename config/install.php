<?php

    if (stristr($_SERVER['REQUEST_URI'], '/config/setup.php') == false)
        die();


    $bdd->query("INSERT INTO `comments` (`id`, `uid`, `user_uid`, `img_uid`, `comment`, `date`) VALUES
                (34, '2sfzqnvw1iqsk8ckoks8cg0wggkk0wgwoo8kgggwgk448880gg', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2cjtmlk1kxj44c88k880c4os8k0gkosogso0kww0wkwwg8s000', 'lol trop drol ', '2020-04-09 17:53:22'),
                (33, '3obuty6nx24g0844g8wsk0sooc4gwockc8ocow4c0k08gw8w48', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'plein de meeeeeeeesage', '2020-04-09 15:22:13'),
                (32, '4nicfikbfr0gc4wkokckswoo0oscsk8go8ws4ogwgw0sck8wo4', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'je test des message ', '2020-04-09 15:21:57'),
                (31, '2dn78rf645xcggkg000cso88sg0w4w4gg8go0o84sw08skgkww', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'et ca marche cest incroyable', '2020-04-09 14:59:46'),
                (30, '3g2o5fruf9gk8w8g8wcsokok84owo80w0soow4008sg8kkcsck', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'peut etre que oui peut etre que non ', '2020-04-09 14:30:56'),
                (29, '462u8v9r5eo0sogkogc0os0ggk0ggwws40gsc8cccgg84488cc', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'je fait plein de test qui serve peut etre', '2020-04-09 14:28:37'),
                (28, '3q3eryaoy1kws08gk0skkok4488sc80w8c00oo4w8o44k0wwog', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'jaddor les fraise', '2020-04-09 14:26:30'),
                (27, '5on4a28w0q04808gscs0c4cgwwc8oo44ck4wkkc0o4ww88kcs0', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'test jais dit ', '2020-04-09 14:25:59'),
                (26, '1g074ilfosiswo4g0so4oko0wokkwwswgcg8gc44s08sco0484', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'test', '2020-04-09 14:25:46'),
                (23, '57cbf4hyopogwkwgk4cg0ww8cgosookccc08g8g8gss8o0s4cs', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '6cjcaomxcug44owg800wo0wkowo4skkcw80cwg0w8ocwgwsg8g', 'cd', '2020-04-09 14:21:27'),
                (22, '3pg0r6j0usqok00cg44s8okwkwk4coo40okwgwgoog4ccksocw', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 'coucou les pote lourg ce poste !!', '2020-04-09 13:19:48'),
                (19, '4989rvp20zcwkgso00oss4gw0o8cco4w08owsw8o8kwocswssc', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', 'prm7d6jwu28o4w0kwkscgwsws80k844g4wgw4sksggw00gcww', 'retest ', '2020-04-09 13:01:49'),
                (41, 'yhujmokyjvkgk48wk0w0g8s4o8w48sogwk08oo4ccwww44c4c', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', 'na41t6zqi80wwc4ks84ww0sccwo48sw08ccwksckgwgo44kg8', 'xs', '2020-04-19 01:20:32'),
                (36, '7kvqpolw3qwwg848o8c8gocckkksowo8so404s4sk0g8wowww', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3xezkgck4zcw0gkcccg08ockgok4gww8cs4wkwgko4ww4c880s', '&lt;strong&gt;cdcdc&lt;/strong&gt;', '2020-04-16 12:52:44'),
                (37, '62bas9uis0g8gwswso88o00g8cs00wo8skww084oco8484o004', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3xezkgck4zcw0gkcccg08ockgok4gww8cs4wkwgko4ww4c880s', 'je teste ', '2020-04-16 19:54:43'),
                (39, '13ghs7amm7q8ow8wk0o8csgkgo0wwgs8k8g880sk0g84sc4sgw', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3t1kiw2236io44oogws4kcggk8k4kgoo00s8soo4owko00s84c', 'test', '2020-04-18 13:04:34'),
                (40, '68zyq801dhgkogowgc0ks80wwc48408c4ccgokc0sco40w8kcw', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3xezkgck4zcw0gkcccg08ockgok4gww8cs4wkwgko4ww4c880s', 'wow', '2020-04-18 19:49:43'),
                (42, '38kfmcfdc8o44ko448wgcksg048ockgk4wk8s0o4gkokkgowkc', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5prfyigpf3swwo8cg8sw4cw44cc0oskgw04c4k840cgo08ook0', 'cool', '2020-04-24 23:08:15'),
                (43, 'y2n3eeg38dcgk8swcwwcgww4w4cs0kgg08go0k0owgk0kgwkc', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '8ibbjzp3ydk40kcs84oc0c8cwo44kcsc4skwcooks04gk0k4s', 'ovo', '2020-04-24 23:21:40'),
                (44, '5lehyvl7v8o4sogc4cgc4o0ogk84o044wkgkkkkkc48o4kggww', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', 'aq1dj6vluhkcck88c8wgkgw004w0ok4ok4kswssgg0oo0goww', 'aller', '2020-04-25 11:46:50'),
                (45, '2hrnkhmy0zoksgwws8kk8sg8kgsk8cco4k0ws8w8wk8g0w04k4', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', '3xezkgck4zcw0gkcccg08ockgok4gww8cs4wkwgko4ww4c880s', 'incroyable ', '2020-04-25 12:31:52'),
                (46, '27hm12tajbi8g84s4ow4ksc04kgk880ckwkw44os880oc0cw4w', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3xezkgck4zcw0gkcccg08ockgok4gww8cs4wkwgko4ww4c880s', 'incroyabe ', '2020-04-26 00:52:31');");





    $bdd->query("INSERT INTO `gallery` (`img_id`, `img_name`, `img_user`, `img_uid`, `nb_like`, `img_date`, `nb_comm`) VALUES
                (2, 'fbe18cce8a93ddd4e384508f007a8a2e.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', 'prm7d6jwu28o4w0kwkscgwsws80k844g4wgw4sksggw00gcww', 1, '2020-04-07 10:41:52', 6),
                (97, 'a0d61ea75190db979577a6d5c7236921.png', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '396ou4ee6mo0w0o8gk8s88w4kg44gkg4wwwwggo04sow48sw0c', 1, '2020-04-25 12:41:50', 0),
                (4, '10ece9930f58ddb17b433b1f666aaaf4.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5f0a4jocjbswoc8w84gok4ow84wwccogk8c4k8s848cg0kocog', 0, '2020-04-07 13:25:21', 7),
                (93, '21fddee2080cdf261d6e375fec0af60d.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '1ag60h35ox6skk4g4o080o0wko4cs0w4g000cow8o8g4skkckc', 0, '2020-04-25 12:37:35', 0),
                (94, '117636822e13b6f04294b8df9b5abdbe.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '39u68nu864yssg84s88k000s408gk44ws4wcg4wkc8w4okwk84', 0, '2020-04-25 12:38:05', 0),
                (95, '26e03b2d88e9d751f4767583d4dfeaa1.png', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '2xtsci2jodkw4w04c8owss0444g08k4wkcco4k8cskk44g4so', 0, '2020-04-25 12:38:44', 0),
                (104, '0b993bb70e085ff8f91c6c0dacee5587.png', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '3mr5lestolkwwgkgw0owgc0sc4ogc8w8csckgw0o40gwo88kkc', 1, '2020-04-25 13:05:17', 0),
                (86, '43dbf72f5a8d9b5c577663a11091736d.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '24o0l7bzvv0g444g88cwcww4o0sowg84k0gsog0soo0ww0sgs8', 0, '2020-04-25 12:30:09', 0),
                (11, '0ca6f23b279841cf3d4f3a755e7bef78.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', 'na41t6zqi80wwc4ks84ww0sccwo48sw08ccwksckgwgo44kg8', 0, '2020-04-07 17:03:17', 1),
                (90, 'b23d436cb2a4cd8e45cc53a17f98f86a.png', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', 'w6ojy5g6n1cgs4488okowg88wsok0w4ws0gckgw848k0wswco', 0, '2020-04-25 12:36:14', 0),
                (91, '0382bfc96a2e568f1d4e83d7a08f0634.png', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '2xn83ptexwcg0w8c80ckw8o8g800w080880ksg08wgsw0os0co', 0, '2020-04-25 12:36:37', 0),
                (45, 'c9ac31722aa0b949af38357b489004a1.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '4d46a377yeck0k0css4888gc4wsg80k4ck4w00ww8kg0c4kc0k', 1, '2020-04-12 20:45:24', 0),
                (44, '24e9e523717a720869fe9727cf1e935f.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3e4cg2damyasgkoc4w8ocwgsskcwwos4ccgwg8sso004gkcsoo', 1, '2020-04-11 12:04:22', 0),
                (46, '50526a98ffcb3737b8312c490f92f5de.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3xezkgck4zcw0gkcccg08ockgok4gww8cs4wkwgko4ww4c880s', 1, '2020-04-14 13:35:13', 5),
                (47, '8084a9ba853d751cb9a65dab3d62341c.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3t1kiw2236io44oogws4kcggk8k4kgoo00s8soo4owko00s84c', 1, '2020-04-15 19:23:09', 1),
                (92, '0a67b52e00a0f591a78f35b4b48ef90c.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', 'rkduc5v5i7kskkwc84g8cokwco440800088swc0gogggogkc8', 0, '2020-04-25 12:37:19', 0),
                (79, 'e97329948b30e0ad752a30120fcbe9c7.png', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '28bafhe3l8u8gw4ocsgg4w80g0gckocg48c8c04g0k80k4sgwk', 0, '2020-04-25 12:19:09', 0),
                (80, 'aa865d6a88faef840379cf392d318742.png', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '2m6j7wc5p70goo00gg0ck0gk0gg44o80w4wcgks0wg8ogkcskk', 1, '2020-04-25 12:21:52', 0),
                (83, '356c4115c62b21b6e254d5415d11ac55.png', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', 'eid3ckrob5wk44gw00g8kw8osowwo8k4gos4gos0owkwwwwog', 0, '2020-04-25 12:26:15', 0),
                (84, 'b659685a9552e09fcdc8cdbb0ad6bc44.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '6c2hg747y4g040wcskssgwcwckgs0g0w40wokcgkk84k8ccc08', 0, '2020-04-25 12:28:07', 0),
                (85, '21610a264152c1ac9f28d2a4aa552fa8.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5uj52frvbq0w8g4kkswckw0gs880008kok48ckc4cs8c4ss0g4', 0, '2020-04-25 12:28:50', 0),
                (66, '0607a4253165b1b5516515338aad48a5.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3szixfg4fj8kg40o0wwco0co0884g04o4wss88c0g8s4cc84sw', 0, '2020-04-22 09:23:30', 0),
                (88, 'b32e0c405f8bb2c484cb46406b635cd6.png', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', '32thjcjx1da8soscogsc80k8wo8co48gos8sco484cccsg08ss', 1, '2020-04-25 12:31:11', 0),
                (89, 'f0b957fd0f188bf6e946cc3a0d9b3394.png', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', '1onaq6f5lp28g484gkss4wggsswg8kw84c0wccg4448sgoc8og', 0, '2020-04-25 12:31:25', 0),
                (29, 'ce8bd6fb65d382a1c625be0925c84f31.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '42p2io9eim2oww8g0wc0wg48ww04sc04gkoggooo88cwcsgogk', 1, '2020-04-07 22:11:12', 0),
                (39, '68f8e3b01ef76484edab242ffab3cb64.png', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '6cjcaomxcug44owg800wo0wkowo4skkcw80cwg0w8ocwgwsg8g', 1, '2020-04-08 17:39:51', 1),
                (40, '90f90a083b8128c3dd1e153c4a671626.png', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '3xkmh3k48kmcwgcsw4cwk0848g4g0444ogg04wog40ss4kkosw', 1, '2020-04-08 20:36:38', 1),
                (81, '5342fa391285a58df1c8540713b4c836.png', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '287xst03yuckksw4wsgo8o80gwskwsck88gckokcgoc40sgkws', 0, '2020-04-25 12:24:22', 0),
                (82, '4ad6a3c2a79f262ed838c6c709ecc9ac.png', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '5abqnyain9ooo0ss4ocw04g8g4s400c4co844ggcgw0o8c0so0', 0, '2020-04-25 12:25:22', 0),
                (77, '88e11be549ef955e491a4a5ceee58ae7.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', 'pwnrmxv49dwkogkg4go0888wgg8g8k88800oow4gw8w4gcwo0', 1, '2020-04-22 19:36:53', 0),
                (78, 'bf058b4cf242e0d4f4227ba7e288a210.png', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', '1biptugcr07444wog8g44gwokog0ss8kg4c4okgog004s00s0o', 0, '2020-04-25 11:53:02', 0),
                (87, 'b5a902b5c1f56b5c706a7a188a10560c.png', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', '1dqzmn2dknr4w48oso8ggcwok04k84wccgokkckwskkwc88880', 0, '2020-04-25 12:30:42', 0),
                (38, '4ea47317da39c565c4e73135e7060a28.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '4j23aqsubyww8ksw4w840s8ogc8wgc8sokg4kkc0skg8sg8s4s', 0, '2020-04-08 10:19:41', 13),
                (98, '9f9921175f360a65f9dcf29557657c54.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5lvh2xo634coowswogs04gso4w084co4ggokcc08sg8008woo', 1, '2020-04-25 12:50:48', 0),
                (99, '6ac045d9b9d33aca238398c6c5958da1.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3f5s92zvxdyc4k0gc4s00gg0cwog8c4gokg8sccg8s4kksgwkk', 1, '2020-04-25 12:51:09', 0),
                (100, 'cbc195cf102889adf80b883059cca1d3.png', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '3p6iwgl31xq808wwcwck08wsk0og4wosk48sscwo0w88so4o8', 0, '2020-04-25 13:03:18', 0),
                (101, '474daea5ae15a109b1e4921799d1308b.png', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '4pmmji2btngggskk4wk8occcok4sc084o44kwwkcwk0sc0w0s', 0, '2020-04-25 13:03:46', 0),
                (102, '5495518b5e0be8c033b4f0eeda806992.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2sjucts0n50kk00k40kcsw08cgok8884c00kok4ck0woo488oo', 1, '2020-04-25 13:04:17', 0),
                (103, 'dfd36533ce1f01ccb210fe3942eb3cde.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '13w1vdqy305c8gwgcwkww8gooc44kg08sck8ooook0084k8s0g', 1, '2020-04-25 13:04:29', 0),
                (105, 'c6fd9a91eb161b7b3623e2cd24218e5f.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '4s97b3swbn28ccwwswkockoc44o04w0sgogs8csgs0scwgo0k8', 1, '2020-04-25 13:05:59', 0),
                (106, 'afb2569116985661d0451cc8b04ea1d2.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', 'xcehdudtiw0k8804c4sg0kokc4g0oo0gw8g8cwsswgc0gwcc0', 0, '2020-04-25 13:06:08', 0),
                (107, '31d23c280905877f3e3b9d026ac5c978.png', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '1ncsh0iej81wc0swk80swsoo4gg448ck4ssgcckgwc4o0kkowg', 0, '2020-04-25 13:07:53', 0);");





    $bdd->query("INSERT INTO `likes` (`like_id`, `like_post`, `like_user`, `like_date`) VALUES
                (2, '3xkmh3k48kmcwgcsw4cwk0848g4g0444ogg04wog40ss4kkosw', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-09 09:11:44'),
                (9, '6cjcaomxcug44owg800wo0wkowo4skkcw80cwg0w8ocwgwsg8g', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-09 15:03:03'),
                (5, '3f0sgmh6h800ogw0s8gk884g04ok008ookcwoogg88c0o40kw0', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-09 10:03:14'),
                (8, '3q5bz2xx1b28ck4w8wwc44g44gk40cw04swkk0w4w88sswoowk', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '2020-04-09 10:26:45'),
                (7, 'prm7d6jwu28o4w0kwkscgwsws80k844g4wgw4sksggw00gcww', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '2020-04-09 10:18:40'),
                (11, '42p2io9eim2oww8g0wc0wg48ww04sc04gkoggooo88cwcsgogk', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-11 10:58:46'),
                (62, '3mr5lestolkwwgkgw0owgc0sc4ogc8w8csckgw0o40gwo88kkc', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 17:02:57'),
                (45, '396ou4ee6mo0w0o8gk8s88w4kg44gkg4wwwwggo04sow48sw0c', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-25 14:45:49'),
                (14, '2cjtmlk1kxj44c88k880c4os8k0gkosogso0kww0wkwwg8s000', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-11 14:07:09'),
                (16, '4d46a377yeck0k0css4888gc4wsg80k4ck4w00ww8kg0c4kc0k', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-13 13:17:51'),
                (26, '3t1kiw2236io44oogws4kcggk8k4kgoo00s8soo4owko00s84c', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-19 13:29:25'),
                (44, '5lvh2xo634coowswogs04gso4w084co4ggokcc08sg8008woo', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-25 14:45:45'),
                (24, '3xezkgck4zcw0gkcccg08ockgok4gww8cs4wkwgko4ww4c880s', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-19 01:17:25'),
                (61, '4s97b3swbn28ccwwswkockoc44o04w0sgogs8csgs0scwgo0k8', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 17:02:55'),
                (28, '3b9tvyojmkqo8g0sogg0okk4oksswkgc0cs8004gg80gocsk40', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-19 13:40:26'),
                (31, '1hazyrkdwdc0swcwk8c8448okksws0sc4ck40g008kkock0k00', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-19 13:42:24'),
                (32, '8ibbjzp3ydk40kcs84oc0c8cwo44kcsc4skwcooks04gk0k4s', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-22 10:39:58'),
                (33, '3cs4bgz3hc000cw80ssgowwgcco84w8g0sswcwkk0wok0wsggo', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-22 10:39:59'),
                (34, '1hy7vp9i3iisc8k00g804ss400gggs8g0gc4swoscckk040oow', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-22 10:40:01'),
                (35, '1dpkr9mxqty8g40kcg4kososgo8w0scs8wgckww0c8840sow0g', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-22 10:40:10'),
                (36, '6cdqprgn97woggs4s8go8wk88wgw0k04cwcoo0go4gg4c8kk8g', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-24 22:35:50'),
                (37, 'aq1dj6vluhkcck88c8wgkgw004w0ok4ok4kswssgg0oo0goww', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-24 23:21:46'),
                (38, 'pwnrmxv49dwkogkg4go0888wgg8g8k88800oow4gw8w4gcwo0', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', '2020-04-25 11:41:36'),
                (47, '2sjucts0n50kk00k40kcsw08cgok8884c00kok4ck0woo488oo', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 16:02:53'),
                (50, '13w1vdqy305c8gwgcwkww8gooc44kg08sck8ooook0084k8s0g', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 16:14:17'),
                (51, '3e4cg2damyasgkoc4w8ocwgsskcwwos4ccgwg8sso004gkcsoo', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 16:59:26'),
                (53, '3f5s92zvxdyc4k0gc4s00gg0cwog8c4gokg8sccg8s4kksgwkk', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 17:00:45'),
                (54, '32thjcjx1da8soscogsc80k8wo8co48gos8sco484cccsg08ss', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 17:00:51'),
                (55, '2m6j7wc5p70goo00gg0ck0gk0gg44o80w4wcgks0wg8ogkcskk', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '2020-04-28 17:00:58');");




    $bdd->query("INSERT INTO `token` (`id`, `user_uid`, `token_creat`) VALUES
                (4, 'uidsjfqm2q8c04ckww8o8oco80sc8sswk00o0048gscook0ko4s8k8', '2o7a7q5prr28owg4sw8kc44w0o0kwwwks8ssww0c4008c080k8'),
                (3, '2xvkl7lhouuckko84kgssc0wo48sw8kssc88g484o8s4ogc48gokk', '3lgrk8ccqqiooowkwk8w0wk8coos040o884wcogsscg4swkk8k'),
                (18, 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '3rhxmr0qfzs4ogkw4cgc8s4gk488k0sgcwos8wsgcokww0gcww'),
                (13, '27a14zb8br9cosskc44s8k8wgswc488k0cwskwck8wwowso0ko', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw'),
                (17, '36k14fv9vf0go8ogococs0wsswk8g4w00wkgg4wcw08wkk48g8', '3t95njry10g0soc4gc84s084400gw844wcsg80cw84sk04ogc4'),
                (16, 'a7jtv5zlg5c00gcg4wgokgssgcoowogo4o44w8ok0ks84o8swc8w', '5nvx8mrszlcsg8ccswogs40c48socgcwg0g04ww4scogs8wwg'),
                (19, 'bc9qvp3esjk0s0wocckskso8gwco4wwk0swcg0okwwkock04co40', 'phungggkixwwo4844gscc4ocscg80so88cscg880cg4ocwo88'),
                (20, '5m1c513x5hgkssw8w8wscs0gccocwgcgg8gk4w0sg0c4k8co4c8', '5f1vjl0rc4o4c8k0w4kswg4k4oc4okokww44gk48w4c4w0kgs8'),
                (21, '6wno6d7wmrggswwss44s8kskkcggs8gggsows0k4c4k40o0ocs48kg8', 'zzeljw4n1s04oc4c8kokksw0w84s0wkow8k8c0o8wwwssoo0k'),
                (22, '4hnkq15v34mckw8sw88ow84k0w0w40g4sgggs4gwcg8w84gw8s0w4', '4gtu7xj7yxwkg4ww0w0w8scskgko8k80sc4c44kwc084ggsc88'),
                (24, 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '1ejor63kws004w0gsokswck8wksoo0gg0gwo0sk8gw4csssgco'),
                (25, 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '49pdbo7b6rk0080kw8gs04o4wgoc40g0okk4okwsogkg0kkc0g'),
                (26, 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '4di8os1hcyw4scs0gk4wcsk88g400c8484wcsswsg40co4scc4'),
                (27, 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '10bpviknqp8gwo4ks0coko00k4gkcokc840ws0c0sgwk8oo0gc'),
                (28, 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', 'v8iebqv5p80sc0kc48484o8kks48sck8koock0k4sws4wk8ws'),
                (29, '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '4v6p9vzpmuqswo40cwkcoco8go0ogo8gkw40s04o00k4048o8w'),
                (30, '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '5mjmq3b24n0g8sk4wk8wwc8o08www88oc80gocow0w80c404ok'),
                (33, '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '2qt5qrxwm3y88kogwkkccgogk8www8cgkwgcwko0wsco4ogksg'),
                (34, 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '5x23pd6iyf0gogg400k0ksc40o8swksgosossscg4g04ccwgc8');");





    $bdd->query("INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_uid`, `user_passwd`, `u_describ`, `email_com`, `nb_com`, `nb_like`, `nb_post`, `user_img`, `user_date`, `confirm`) VALUES
                (1, 'jaco', 'benjamin.duroule@gmail.com', '32wu0sqsq2g4o8sgowkwgk80sw08kg4c4k0ww84c8c4k4gccoo0g', '$2y$10\$Ti6fNkQsQbRLDHR13pXg7OXyJ8s9KA9Kz.wSg5BtN7zikiqN3oMBa', 'pas de description pour l\'instant', 1, 2, 0, 0, 'f9072928296f69fe828b6f0c1dd0d5e1.png', '2020-04-02 21:13:11', 1),
                (2, 'arseox', 'darkcook91@gmail.com', 'u0qzta968dwcwcs4kco44oksc8csok4o40swcwsgkc0oc8804sw', '$2y$10\$W4zDNowmi89dPZcAuschMupcFIwPIyheSIIHCfH4GWTS03dpgMudu', 'vfvfvjnfjvnfjvnjfvnf', 1, 24, 0, 0, '9eea2d3255f3055b396cda36595ab057.png', '2020-04-02 21:38:59', 1),
                (10, 'ben le bg', 'benha@gmail.com', '4hnkq15v34mckw8sw88ow84k0w0w40g4sgggs4gwcg8w84gw8s0w4', '$2y$10$/R.8Itbo39QSJNDwzmYD4uiaz84BPPlri8vAVDjzfkIdDEzDwY7Q6', 'pas de description pour l\'instant', 1, 0, 0, 0, 'default.png', '2020-04-16 13:33:43', 0),
                (11, 'slopez', 'bduroule42@gamil.com', '1xjpnk1xeu1w88k44ck04k8s44gw4888cg08gsw0w4o00gkso8w', '$2y$10\$UvsLoZy3UY7fycbf.w5lROqs8mSHyYDA77oaZygmG1qq/RF57zE66', 'pas de description pour l\'instant', 1, 0, 0, 0, '017450589b09dc40ef6e3a9c175ddc89.png', '2020-04-25 11:38:56', 1),
                (12, 'asaba', 'bduroule101@gamil.com', '7l8a44i2tesk4sgkg8o8o04gwo8g0go0484o40880cs84g0w8wckk', '$2y$10\$Fu5LUA190pU29LzuUQ32RugobjogaTRogGEvJBXlRR.cIuKJ5sc6.', 'pas de description pour l\'instant', 1, 0, 0, 0, 'f5026c3c12e57b7b384af83f211adc42.png', '2020-04-25 12:04:36', 1);
                COMMIT;");


?>